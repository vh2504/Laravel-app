<?php

namespace App\Console\Commands\Import;

use App\Services\Admin\ImportService;
use Illuminate\Console\Command;

/**
 * @example php artisan import:line-and-station --dateTime=20220720
 */
class LineAndStation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:line-and-station {--dateTime=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command import line and station';

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
        return $this->importService->importLineAndStation($this->options());
    }
}
