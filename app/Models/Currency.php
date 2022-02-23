<?php

namespace App\Models;

use App\Traits\Nanoids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Currency extends Model
{
    use HasFactory, HasApiTokens, Nanoids;

    public $fillable = [
        'currency',
        'description',
        'flag_url',
        'is_active',
    ];
}
