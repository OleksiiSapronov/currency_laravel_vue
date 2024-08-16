<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Currency;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    private function getRange($code, $code2) {
        $range = array(1, 2, 5, 10, 50, 100, 500, 1000, 5000, 10000);
        $range2 = array();
        if ($code=="BTC") {  
            $range2 = array(100, 200, 500, 1000, 5000, 10000, 50000, 100000, 500000, 1000000);
        }
        else {  
            $range2 = array(1, 2, 5, 10, 50, 100, 500, 1000, 5000, 10000);
        }

        $os1 = array("VND", "IDR", "GNF", "KHR", "IRR", "PYG", "BYR", "COP", "UZS", "MGA", "UGX", "LAK", "xxx");
        if (in_array($code, $os1)) {
            $range = array(10000, 50000, 100000, 500000, 1000000, 5000000, 10000000, 20000000, 50000000, 100000000);
        }
        
        $os2 = array("VND", "IDR", "GNF", "KHR", "IRR", "PYG", "BYR", "COP", "UZS", "MGA", "UGX", "LAK", "xxx");

        if (in_array($code2, $os2)) {
            $range2 = array(10000, 50000, 100000, 500000, 1000000, 5000000, 10000000, 20000000, 50000000, 100000000);
        }

        $os3 = array("", "XOF", "LBP", "KMF", "CRC", "LBP", "BIF", "TZS", "RWF", "IQD", "MMK", "SYP", "CLP", "KRW", "AMD");
        if (in_array($code, $os3)) {
            $range = array(1000, 2000, 5000, 10000, 20000, 50000, 100000, 500000, 1000000, 5000000);
        }

        $os4 = array("", "XOF", "LBP", "KMF", "CRC", "LBP", "BIF", "TZS", "RWF", "IQD", "MMK", "SYP", "CLP", "KRW", "AMD");
        if (in_array($code2, $os4)) {
            $range2 = array(1000, 2000, 5000, 10000, 20000, 50000, 100000, 500000, 1000000, 5000000);
        }

        $os5 = array("ALL", "CVE", "AFN", "LKR", "ISK", "HUF", "NGN", "DZD", "KES", "KZT", "THB", "TWD", "JPY", "RUB", "HNL", "MZN", "NPR", "DJF", "INR", "PKR", "MKD", "RSD", "UYU", "BDT", "YER", "PHP", "JMD");
        if (in_array($code, $os5)) {
            $range = array(100, 200, 500, 1000, 2000, 5000, 10000, 50000, 100000, 200000);
        }

        $os6 = array("ALL", "CVE", "AFN", "LKR", "ISK", "HUF", "NGN", "DZD", "KES", "KZT", "THB", "TWD", "JPY", "RUB", "HNL", "MZN", "NPR", "DJF", "INR", "PKR", "MKD", "RSD", "UYU", "BDT", "YER", "PHP", "JMD");
        if (in_array($code2, $os6)) {
            $range2 = array(100, 200, 500, 1000, 2000, 5000, 10000, 50000, 100000, 200000);
        }

        $os7 = array("MOP", "BWP", "ARS", "ZAR", "ETB", "HKD", "NOK", "BOB", "ERN", "GTQ", "MXN", "SEK", "NIO", "PEN", "EGP", "MDL", "QAR", "UAH", "MUR", "SAR", "MAD", "GEL", "AED", "VEF", "HRK", "NAD", "DKK", "ZMK", "PLN", "CNY", "BRL", "TTD", "MYR", "CZK", "ILS", "LTL", "TRY");
        if (in_array($code, $os7)) {
            $range = array(10, 20, 50, 100, 200, 500, 1000, 5000, 10000, 20000);
        }

        $os8 = array("MOP", "BWP", "ARS", "ZAR", "ETB", "HKD", "NOK", "BOB", "ERN", "GTQ", "MXN", "SEK", "NIO", "PEN", "EGP", "MDL", "QAR", "UAH", "MUR", "SAR", "MAD", "GEL", "AED", "VEF", "HRK", "NAD", "DKK", "ZMK", "PLN", "CNY", "BRL", "TTD", "MYR", "CZK", "ILS", "LTL", "TRY");
        if (in_array($code2, $os8)) {
            $range2 = array(10, 20, 50, 100, 200, 500, 1000, 5000, 10000, 20000);
        }

        return array($range, $range2);
    }

    private function getCounties() {
        return Cache::remember('countries', $seconds = 60 * 60, function () {
            $countries = Country::with('latestCurrency')->get();
            $arr = array();
            foreach($countries as $country) {
                if(isset($country->latestCurrency->balance)) 
                    $arr[] = $country;
            }
            return $arr;
        });
    }

    private function getTopCurrencies() {
        // return Cache::remember('top_currencies', $seconds = 60 * 60, function () {
            return Country::with('latestCurrency')->where('top_currency', true)->orderBy('top_order')->limit(12)->get();
        // });
    }

    public function index() {
        $countries = $this->getCounties();
        $topCountries = $this->getTopCurrencies();
        $srcCurrency = null;
        $destCurrency = null;

        if(count($topCountries) < 2) {
            $srcCurrency = Country::with('latestCurrency')->where('country_code', 'US')->first();
            $destCurrency = Country::with('latestCurrency')->where('country_code', 'EU')->first();
        } else {
            $srcCurrency = $topCountries[0];
            $destCurrency = $topCountries[1];
        }

        return Inertia::render('Home', [
            'countries' => $countries,
            'topCountries' => $topCountries,
            'srcCurrency' => $srcCurrency,
            'destCurrency' => $destCurrency,
            'mode' => 1
        ]);
    }

    public function page($value) {
        $topCountries = $this->getTopCurrencies();
        $countries = $this->getCounties();
        
        if(preg_match('/([a-z-]+)-page/i', $value, $matches)) {
            $data = explode('-', $matches[1]);
            $srcCountry = Country::with('latestCurrency')
                ->where('currency_code', strtoupper($data[count($data) - 1]))->first();
                        
            $destCurrency = Country::with('latestCurrency')->where('country_code', 'EU')->first();
            
            $topCountries[0] = $srcCountry;

            return Inertia::render('Home', [
                'countries' => $countries,
                'topCountries' => $topCountries,
                'srcCurrency' => $srcCountry,
                'destCurrency' => $destCurrency,
                'mode' => 3
            ]);
        } else if(preg_match('/([a-z-0-9.]+)-calculator/i', $value, $matches)) {
            $data = explode('-', $matches[1]);
            $srcCountry = Country::with('latestCurrency')
                ->where('currency_code', strtoupper($data[count($data) - 1]))->first();
            $balance = floatval($data[0]);

            $topCountries[0] = $srcCountry;

            return Inertia::render('Home', [
                'countries' => $countries,
                'topCountries' => $topCountries,
                'srcCurrency' => $srcCountry,
                'destCurrency' => $srcCountry,
                'mode' => 4,
                'balance' => $balance == 0 ? 100 : $balance
            ]);
        } else if(preg_match('/([0-9.]+)-([a-z-]+)-to-([a-z-]+)/i', $value, $matches)) {
            $amount = floatval($matches[1]);
            $data = explode('-', $matches[2]);
            $srcCountry = Country::with('currencies')->with('latestCurrency')
                ->where('currency_code', strtoupper($data[count($data) - 1]))->first();
            $data = explode('-', $matches[3]);
            $destCountry = Country::with('latestCurrency')
                ->where('currency_code', strtoupper($data[count($data) - 1]))->first();

            $ranges = $this->getRange($srcCountry['currency_code'], $destCountry['currency_code']);
            $range = array();
            for($i = 0; $i < count($ranges[0]); $i ++) {
                $range[] = array($ranges[0][$i], $ranges[1][$i]);
            }
            $topCountries[0] = $srcCountry;

            return Inertia::render('Home', [
                'countries' => $countries,
                'topCountries' => $topCountries,
                'srcCurrency' => $srcCountry,
                'destCurrency' => $destCountry,
                'mode' => 2,
                'range' => $range,
                'past' => $srcCountry->currencies()->where('date', '>', \Carbon\Carbon::now()->subDays(31))->orderBy('date')->get(),
                'balance' => $amount == 0 ? 100 : $amount
            ]);
        }
    }
}
