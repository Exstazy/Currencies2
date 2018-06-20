<?php

namespace App\Console\Commands;

use App\Currencies;
use App\Services\CurrencyService;
use Illuminate\Console\Command;

class UpdateCurrencies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currencies:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Currencies';

    /**
     * Create a new command instance.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $currencies = (new CurrencyService())->parseFromXMLBank();

        foreach ($currencies as $currency) {
            (new Currencies())->updateOrCreate([
                'name' => $currency[0],
            ], [
                'name' => $currency[0],
                'rate' => $currency[1],
            ]);
        }

        $this->info('Currencies are updated');
    }
}
