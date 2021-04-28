<?php

namespace App\Console\Commands;

use App\Services\ImportCurrenciesService;
use Illuminate\Console\Command;

class CurrencyRate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import currencies';
    /**
     * @var ImportCurrenciesService
     */
    private $importCurrenciesService;

    /**
     * Create a new command instance.
     *
     * @param ImportCurrenciesService $importCurrenciesService
     */
    public function __construct(ImportCurrenciesService $importCurrenciesService)
    {
        parent::__construct();
        $this->importCurrenciesService = $importCurrenciesService;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): void
    {
        $this->importCurrenciesService->import();
    }
}
