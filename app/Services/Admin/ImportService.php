<?php

namespace App\Services\Admin;

use App\Contracts\Repositories\CityRepository;
use App\Contracts\Repositories\LineRepository;
use App\Contracts\Repositories\LineStationRepository;
use App\Contracts\Repositories\PostalCodeRepository;
use App\Contracts\Repositories\PrefectureRepository;
use App\Contracts\Repositories\StationRepository;
use App\Models\City;
use App\Models\PostalCode;
use App\Models\Prefecture;
use Illuminate\Console\OutputStyle;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Mockery\Exception;
use ZipArchive;
use Illuminate\Support\Facades\File;
use Symfony\Component\Console\Output\ConsoleOutput;

class ImportService
{
    /**
     * @param \App\Contracts\Repositories\CityRepository        $cityRepository
     * @param \App\Contracts\Repositories\PrefectureRepository  $prefectureRepository
     * @param \App\Contracts\Repositories\PostalCodeRepository  $postalCodeRepository
     * @param \App\Contracts\Repositories\StationRepository     $stationRepository
     * @param \App\Contracts\Repositories\LineRepository        $lineRepository
     * @param \App\Contracts\Repositories\LineStationRepository $lineStationRepository
     * @param \Symfony\Component\Console\Output\ConsoleOutput   $output
     */
    public function __construct(
        protected readonly CityRepository $cityRepository,
        protected readonly PrefectureRepository $prefectureRepository,
        protected readonly PostalCodeRepository $postalCodeRepository,
        protected readonly StationRepository $stationRepository,
        protected readonly LineRepository $lineRepository,
        protected readonly LineStationRepository $lineStationRepository,
        protected readonly ConsoleOutput $output,
    ) {
        //..
    }

    /**
     * @param array $options
     *
     * @return int
     */
    public function importLineAndStation(array $options): int
    {
        $dateTime = (string)Arr::get($options, 'dateTime', '');
        if (!$dateTime) {
            $this->output->writeln('Please enter line and station file name....');

            return 0;
        }

        $line = "line{$dateTime}free.csv";
        $station = "station{$dateTime}free.csv";
        //$join = (string)Arr::get($options, 'join', '');

        $dataFolder = storage_path('data');
        $importFolder = storage_path('import');
        if (!File::exists($importFolder)) {
            File::makeDirectory($importFolder);
        }
        $this->output->writeln("Check folder exits: {$dataFolder}");

        // Check files exits
        $fileLine = "{$dataFolder}/{$line}";
        $fileStation = "{$dataFolder}/{$station}";
        //$fileJoin = "{$dataFolder}/{$join}";
        if (!file_exists($fileLine) || !file_exists($fileStation) /*|| !file_exists($fileJoin)*/) {
            $this->output->writeln("Please make sure files exits: {$fileLine} and {$fileStation}");

            return 0;
        }

        $this->importLines($fileLine);
        $this->importStations($fileStation);
        //$this->importLineStations($fileJoin);

        $this->output->writeln('All done.');

        return 0;
    }

    /**
     * @return int
     */
    public function importZipCode(): int
    {
        $this->output->writeln('Start import....');
        $lineNumber = 1;
        try {
            $importFolder = storage_path('import');
            $this->output->writeln("Check folder exits: {$importFolder}");
            // Create import folder
            if (!File::exists($importFolder)) {
                File::makeDirectory($importFolder);
            }

            $link = 'https://www.post.japanpost.jp/zipcode/dl/kogaki/zip/ken_all.zip';
            $this->output->writeln("Check and download file: {$link}");
            $filePath = "{$importFolder}/ken_all.zip";
            if (!file_exists($filePath)) {
                if (!copy($link, $filePath)) {
                    return 0;
                }
            }
            $csvOrigin = "{$importFolder}/KEN_ALL.CSV";

            $this->output->writeln("Unzip download file: {$filePath}");
            $zip = new ZipArchive;
            $res = $zip->open($filePath);
            if (!$res) {
                return 0;
            }
            $zip->extractTo($importFolder);
            $zip->close();

            $csvUtf8 = "{$importFolder}/KEN_ALL_UTF8.csv";
            $this->output->writeln("Convert content csv to utf8: {$csvUtf8}");
            $this->convertFileToUtf8($csvOrigin, $csvUtf8);

            // Read a CSV file
            $handle = fopen($csvUtf8, "r");
            if (!$handle) {
                return 0;
            }
            while (($raw = fgets($handle)) !== false) {
                $row = str_getcsv($raw);
                $zipCode = $row['2'];
                $prefectureName = trim($row['6'] ?? '');
                $prefectureId = $this->getOrCreatePrefecture($prefectureName);
                if (!$prefectureId) {
                    continue;
                }

                $cityName = trim($row['7'] ?? '');
                $cityId = $this->getCityId($prefectureId, $cityName);
                if (!$cityId) {
                    continue;
                }

                $firstCode = substr($row['2'], 0, 3);
                $lastCode = substr($row['2'], 3, 4);
                $postalCode = "{$firstCode}-{$lastCode}";

                $postalCodeName = $row['8'] ?? '';
                $this->getPostalCode($cityId, $postalCodeName, $firstCode, $lastCode, $postalCode, $zipCode);

                $msg = "Prefecture: {$prefectureName}, City: {$cityName}, Postal code: {$postalCode}, ";
                $msg .= "Zip code: {$zipCode}";
                $this->output->writeln($msg);

                $lineNumber++;
            }//end while
            fclose($handle);
        } catch (\Exception $exception) {
            Log::error(__METHOD__.$exception->getMessage());
        }//end try

        $this->output->writeln("Import success total: {$lineNumber} postal code....");

        return 0;
    }

    /**
     * @param string $file
     *
     * @return void
     */
    private function importLines(string $file): void
    {
        $lineNumber = 0;
        try {
            // Read a CSV file
            $handle = fopen($file, "r");
            if (!$handle) {
                return;
            }
            while (($raw = fgets($handle)) !== false) {
                if ($lineNumber > 0) {
                    $row = str_getcsv($raw);
                    $code = trim($row[0] ?? null);
                    $name = trim($row[2] ?? null);

                    $this->lineRepository->updateOrCreate([
                        'code' => $code,
                        'name' => $name,
                    ], [
                        'code' => $code,
                        'name' => $name,
                        'lat' => trim($row[8] ?? null),
                        'lon' => trim($row[9] ?? null)
                    ]);
                }//end if

                $lineNumber++;
            }//end while
            fclose($handle);

            return;
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
        }//end try
    }

    /**
     * @param string $file
     *
     * @return void
     */
    private function importStations(string $file): void
    {
        $lineNumber = 0;
        try {
            // Read a CSV file
            $handle = fopen($file, "r");
            if (!$handle) {
                return;
            }
            while (($raw = fgets($handle)) !== false) {
                if ($lineNumber > 0) {
                    $row = str_getcsv($raw);
                    $code = trim($row[0] ?? null);
                    $name = trim($row[2] ?? null);
                    $lineCode = trim($row[5] ?? null);

                    $this->stationRepository->updateOrCreate([
                        'code' => $code,
                        'name' => $name,
                        'line_code' => $lineCode,
                    ], [
                        'code' => $code,
                        'name' => $name,
                        'line_code' => $lineCode,
                        'postal_code' => trim($row[7] ?? null),
                        'address' => trim($row[8] ?? null),
                        'lat' => trim($row[10] ?? null),
                        'lon' => trim($row[9] ?? null)
                    ]);
                }//end if

                $lineNumber++;
            }//end while
            fclose($handle);

            return;
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
        }//end try
    }

    /**
     * @param string $file
     *
     * @return bool
     */
//    private function importLineStations(string $file): bool
//    {
//        $lineNumber = 0;
//        try {
//            // Read a CSV file
//            $handle = fopen($file, "r");
//            if (!$handle) {
//                return false;
//            }
//            while (($raw = fgets($handle)) !== false) {
//                if ($lineNumber > 0) {
//                    $row = str_getcsv($raw);
//
//                    $lineCode = trim($row['0'] ?? null);
//                    $fromCode = trim($row['1'] ?? null);
//                    $destinationCode = trim($row['2'] ?? null);
//
//                    $lineId = $this->lineRepository->getIdByCode($lineCode);
//                    if (!$lineId) {
//                        continue;
//                    }
//
//                    $fromId = $this->stationRepository->getIdByCode($lineCode, $fromCode);
//                    if (!$fromId) {
//                        continue;
//                    }
//                    $destinationCodeId = $this->stationRepository->getIdByCode($lineCode, $destinationCode);
//                    if (!$destinationCodeId) {
//                        continue;
//                    }
//
//                    $this->lineStationRepository->updateOrCreate([
//                        'line_id' => $lineId,
//                        'from_id' => $fromId,
//                        'destination_id' => $destinationCodeId,
//                    ], [
//                        'line_id' => $lineId,
//                        'from_id' => $fromId,
//                        'destination_id' => $destinationCodeId,
//                    ]);
//                }//end if
//
//                $lineNumber++;
//            }//end while
//            fclose($handle);
//
//            return true;
//        } catch (Exception $exception) {
//            Log::error($exception->getMessage());
//        }//end try
//
//        return false;
//    }

    /**
     * @param string $name
     *
     * @return int|null
     */
    private function getOrCreatePrefecture(
        string $name,
    ): ?int {
        $k = "prefecture.{$name}";

        if (!$id = (int)Cache::get($k, 0)) {
            $model = $this->prefectureRepository->updateOrCreate([
                'name' => $name,
            ], [
                'name' => $name,
            ]);
            if ($model instanceof Prefecture) {
                $id = $model->id;
            }
        }

        return $id;
    }

    /**
     * @param int    $cityId
     * @param string $postalCodeName
     * @param string $firstCode
     * @param string $lastCode
     * @param string $postalCode
     * @param string $zipCode
     *
     * @return int|null
     */
    private function getPostalCode(
        int $cityId,
        string $postalCodeName,
        string $firstCode,
        string $lastCode,
        string $postalCode,
        string $zipCode
    ): ?int {
        $model = $this->postalCodeRepository->updateOrCreate([
            'city_id' => $cityId,
            'postal_code' => $postalCode,
            'zip_code' => $zipCode,
        ], [
            'city_id' => $cityId,
            'first_code' => $firstCode,
            'last_code' => $lastCode,
            'postal_code' => $postalCode,
            'zip_code' => $zipCode,
            'name' => $postalCodeName
        ]);

        if ($model instanceof PostalCode) {
            return $model->id;
        }

        return null;
    }

    /**
     * @param int    $prefectureId
     * @param string $name
     *
     * @return int
     */
    private function getCityId(int $prefectureId, string $name): int
    {
        $key = "city.{$prefectureId}.{$name}";
        if (!$id = (int)Cache::get($key, 0)) {
            $model = $this->cityRepository->firstOrCreate(['prefecture_id' => $prefectureId, 'name' => $name]);
            if ($model instanceof City) {
                $id = (int)$model->id;
                Cache::put($key, $id, now()->addMinutes(10));
            }
        }

        return $id;
    }

    /**
     * @param string $fileOld
     * @param string $fileNew
     *
     * @return bool
     */
    private function convertFileToUtf8(string $fileOld, string $fileNew): bool
    {
        $this->output->writeln("Convert content csv to utf8: {$fileNew}");
        if (File::exists($fileOld)) {
            File::delete($fileNew);
        }
        $result = file_put_contents(
            $fileNew,
            mb_convert_encoding(
                (string)file_get_contents($fileOld),
                'UTF-8',
                'SJIS-win'
            )
        );

        if (false === $result) {
            return false;
        }

        return true;
    }
}
