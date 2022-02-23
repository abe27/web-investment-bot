<?php

namespace App\Models;

use App\Traits\Nanoids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Trend extends Model
{
    use HasFactory, HasApiTokens, Nanoids;

    public $fillable = [
        'asset_id',
        'exchange_id',
        'currency_id',
        'trend',
        'last_price',
        'last_percent',
        'open_order',
        'on_timeframe',
        'is_active',
    ];

    protected $casts = [
        'on_timeframe' => 'array',
    ];

    public function assets()
    {
        return $this->hasOne(Asset::class, 'id', 'asset_id');
    }

    public function exchanges()
    {
        return $this->hasOne(Exchange::class, 'id', 'exchange_id');
    }

    public function currencies()
    {
        return $this->hasOne(Currency::class, 'id', 'currency_id');
    }
}
