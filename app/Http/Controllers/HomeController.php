<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index() {
        $flag = array('RO' => 0, 'US' => 1, 'EU' => 2, 'CA' => 3, 'AU' => 4, 'GB' => 5, 'CH' => 6, 'CN' => 7, 'SE' => 8, 'SG' => 9, 'PL' => 10, 'HK' => 11, 'JP' => 12);
        
        $countries = Cache::remember('countries', $seconds = 60 * 60, function () {
            return Country::orderBy('order', 'desc')->get();
        });

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
            if(isset($flag[$country['country_code']])) {
                $topCountries[$flag[$country['country_code']]] = $country;
            }
        }

        $tmp = array();
        for($i = 0; $i <= 12; $i ++) $tmp[] = $topCountries[$i];

        return Inertia::render('Home', [
            'countries' => $countries,
            'topCountries' => $tmp,
            'srcCurrency' => $srcCurrency,
            'destCurrency' => $destCurrency
        ]);
    }
}
