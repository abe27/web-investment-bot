<?php

namespace App\Models;

use App\Traits\Nanoids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Asset extends Model
{
    use HasFactory, HasApiTokens, Nanoids;

    public $fillable = [
        'group_id',
        'symbol',
        'description',
        'image_url',
        'is_active',
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
