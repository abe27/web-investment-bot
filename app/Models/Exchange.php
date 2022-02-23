<?php

namespace App\Models;

use App\Traits\Nanoids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Exchange extends Model
{
    use HasFactory, HasApiTokens, Nanoids;

    public $fillable = [
        'group_id',
        'name',
        'description',
        'image_url',
        'is_active',
    ];

    public function exchange_groups()
    {
        return $this->belongsTo(ExchangeGroup::class, 'group_id', 'id');
    }
}
