<?php

namespace App\Console\Commands\Import;

use App\Services\Admin\ImportService;
use Illuminate\Console\Command;

class ZipCode extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:zip-code';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command import zip code';

    /**
     * @param \App\Services\Admin\ImportService $importService
     */
    public function __construct(protected readonly ImportService $importService)
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        return $this->importService->importZipCode();
    }
}
