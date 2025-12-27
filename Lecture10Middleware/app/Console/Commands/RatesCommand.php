<?php

namespace App\Console\Commands;

use CurrencyApi\CurrencyApi\CurrencyApiClient;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class RatesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:rates-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $response = Http::get(env("API_RATES_URL")."v3/latest?", [
            'apikey' => env("API_RATES_KEY"),
            'base_currency' => 'RSD',
        ]);

        $jsonResponse = $response->json();

        $eur = $jsonResponse['data']['EUR'];
        $dollar = $jsonResponse['data']['USD'];
        dd($dollar, $eur);
    }
}
