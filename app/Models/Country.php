<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['country_code', 'country_name', 'currency_name', 'currency_code', 'currency_sign', 'call', 'value', 'date', 'order'];

    // public function currency() {
    //     return $this->hasOne(Currency::class);
    // }

    public function getCurrencyFullNameAttribute() {
        return $this->call . ' ' . $this->currency_name;
    }
}
