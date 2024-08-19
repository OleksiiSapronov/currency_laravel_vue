<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Currency;

class GetData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-data';

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
        $day = date("Y-m-d");
        
        $ch = curl_init('https://apilayer.net/api/historical?access_key=1b557473e8cc9b2747c6037df7a993c8&currencies=&source=GBP&format=1&date='.$day);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $json = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curlError = curl_error($ch);
        curl_close($ch);
        
        if ($httpCode >= 200 && $httpCode < 300) {
            // Successful response
            $exchangeRates = json_decode($json, true);

            $time = date('Y-m-d H:i:s', $exchangeRates['timestamp']);
            $res = array(['currency_code' => 'GBP', 'balance' => 1, 'date' => $time]);
            foreach($exchangeRates['quotes'] as $key => $value) {
                $res[] = array('currency_code' => substr($key, 3), 'balance' => $value, 'date' => $time);
            }
            Currency::insert($res);
        }
    }
}
