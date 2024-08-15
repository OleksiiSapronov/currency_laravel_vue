<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Currency extends Model
{
    use HasFactory;

    protected $fillable = ['currency_code', 'balance', 'date'];

    public function country(): BelongsTo {
        return $this->belongsTo(Country::class, 'currency_code', 'currency_code');
    }
}
