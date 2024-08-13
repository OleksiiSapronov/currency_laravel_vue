<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    protected $flagCountries = array('RO' => 0, 'US' => 1, 'EU' => 2, 'CA' => 3, 'AU' => 4, 'GB' => 5, 'CH' => 6, 'CN' => 7, 'SE' => 8, 'SG' => 9, 'PL' => 10, 'HK' => 11, 'JP' => 12);
    
    private function getCounties() {
        return Cache::remember('countries', $seconds = 60 * 60, function () {
            return Country::orderBy('order', 'desc')->get();
        });
    }

    public function index() {
        $flags = $this->flagCountries;
        
        $countries = $this->getCounties();

        $srcCurrency = null;
        $destCurrency = null;

        $topCountries = array();

        foreach($countries as $country) {
            if($country['country_code'] == 'RO') {
                $srcCurrency = $country;
            }
            if($country['country_code'] == 'EU') {
                $destCurrency = $country;
            }
            if(isset($flags[$country['country_code']])) {
                $topCountries[$flags[$country['country_code']]] = $country;
            }
        }

        $tmp = array();
        for($i = 0; $i < count($flags); $i ++) $tmp[] = $topCountries[$i];

        return Inertia::render('Home', [
            'countries' => $countries,
            'topCountries' => $tmp,
            'srcCurrency' => $srcCurrency,
            'destCurrency' => $destCurrency,
            'mode' => 1
        ]);
    }

    public function page($value) {
        $flags = $this->flagCountries;
        $newFlags = array();
            
        if(preg_match('/([a-z-]+)-page/i', $value, $matches)) {
            $data = explode('-', $matches[1]);
            $srcCountry = Country::where('currency_code', strtoupper($data[count($data) - 1]))->first();
            
            $idx = 0;
            foreach($flags as $key => $value) {
                if(count($newFlags) == 0) {
                    $newFlags[$srcCountry['country_code']] = $idx ++;
                } else if($key == $srcCountry['country_code']) continue;
                else {
                    $newFlags[$key] = $idx ++;
                }
            }
            
            $countries = $this->getCounties();

            $destCurrency = null;

            $topCountries = array();

            foreach($countries as $country) {
                if($country['country_code'] == 'EU') {
                    $destCurrency = $country;
                }
                if(isset($newFlags[$country['country_code']])) {
                    $topCountries[$newFlags[$country['country_code']]] = $country;
                }
            }

            $tmp = array();
            for($i = 0; $i < count($newFlags); $i ++) $tmp[] = $topCountries[$i];
            return Inertia::render('Home', [
                'countries' => $countries,
                'topCountries' => $tmp,
                'srcCurrency' => $srcCountry,
                'destCurrency' => $destCurrency,
                'mode' => 3
            ]);
        } else if(preg_match('/([a-z-0-9.]+)-calculator/i', $value, $matches)) {
            $data = explode('-', $matches[1]);
            $srcCountry = Country::where('currency_code', strtoupper($data[count($data) - 1]))->first();
            $balance = floatval($data[0]);

            $idx = 0;
            foreach($flags as $key => $value) {
                if(count($newFlags) == 0) {
                    $newFlags[$srcCountry['country_code']] = $idx ++;
                } else if($key == $srcCountry['country_code']) continue;
                else {
                    $newFlags[$key] = $idx ++;
                }
            }
            
            $countries = $this->getCounties();

            $topCountries = array();

            foreach($countries as $country) {
                if(isset($newFlags[$country['country_code']])) {
                    $topCountries[$newFlags[$country['country_code']]] = $country;
                }
            }

            $tmp = array();
            for($i = 0; $i < count($newFlags); $i ++) $tmp[] = $topCountries[$i];

            return Inertia::render('Home', [
                'countries' => $countries,
                'topCountries' => $tmp,
                'srcCurrency' => $srcCountry,
                'destCurrency' => $srcCountry,
                'mode' => 4,
                'balance' => $balance == 0 ? 100 : $balance
            ]);
        } else if(preg_match('/([0-9.]+)-([a-z-]+)-to-([a-z-]+)/i', $value, $matches)) {
            $amount = floatval($matches[1]);
            $data = explode('-', $matches[2]);
            $srcCountry = Country::where('currency_code', strtoupper($data[count($data) - 1]))->first();
            $data = explode('-', $matches[3]);
            $destCountry = Country::where('currency_code', strtoupper($data[count($data) - 1]))->first();
            
            $countries = $this->getCounties();

            $topCountries = array();
        
            $idx = 0;
            foreach($flags as $key => $value) {
                if(count($newFlags) == 0) {
                    $newFlags[$srcCountry['country_code']] = $idx ++;
                } else if($key == $srcCountry['country_code']) continue;
                else {
                    $newFlags[$key] = $idx ++;
                }
            }
            
            foreach($countries as $country) {
                if(isset($newFlags[$country['country_code']])) {
                    $topCountries[$newFlags[$country['country_code']]] = $country;
                }
            }

            $tmp = array();
            for($i = 0; $i < count($newFlags); $i ++) $tmp[] = $topCountries[$i];

            return Inertia::render('Home', [
                'countries' => $countries,
                'topCountries' => $tmp,
                'srcCurrency' => $srcCountry,
                'destCurrency' => $destCountry,
                'mode' => 2,
                'balance' => $amount == 0 ? 100 : $amount
            ]);
        }
    }
}
