<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Country extends Model
{
    use HasFactory;
    
    protected $fillable = ['country_code', 'country_name', 'currency_name', 'currency_code', 'currency_sign', 'call', 
    'display', 'display_order', 'top_currency', 'top_order', 'value', 'date', 'order'];

    public function currencies() {
        return $this->hasMany(Currency::class, 'currency_code', 'currency_code');
    }

    public function latestCurrency(): HasOne {
        return $this->hasOne(Currency::class, 'currency_code', 'currency_code')->orderByDesc('date');
    }

    public function setTopCurrency($value) {
        $this->attributes['top_currency'] = $value ? 1 : 0;
    }

    public function getTopCurrency() {
        return $this->attributes['top_currency'] == 1 ? true : false;
    }

    public function getCurrencyFullNameAttribute() {
        return $this->call . ' ' . $this->currency_name;
    }
}
