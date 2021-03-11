<?php

namespace App\Console\Commands;

use App\Models\Entities\Currency;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class CurrenciesUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currencies:minute';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Currency update every minute';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $response = Http::get('https://blockchain.info/ticker')->body();
        $names = [];
        $new_currencies = [];
        $now = now();
        foreach (json_decode($response) as $key => $value) {
            $names[] = $key;

            $new_currencies[] = [
                'currency' => $key,
                'value' => $value->last,
                'created_at' => $now,
                'updated_at' => $now,

            ];
        }
        $currencies = Currency::whereIn('currency', $names)->get();
        foreach ($new_currencies as $key => $currency) {
            $currency_db = $currencies->where('currency', $currency['currency'])->first();
            if($currency_db) {
                $currency_db->value = $currency['value'];
                $currency_db->update();
                unset($new_currencies[$key]);
            }
        }
        if($new_currencies) Currency::insert($new_currencies);
    }
}
