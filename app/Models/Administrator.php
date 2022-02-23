<?php

namespace App\Models;

use App\Traits\Nanoids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Administrator extends Model
{
    use HasFactory, HasApiTokens, Nanoids;

    public $fillable = [
        'user_id'
    ];

    public function users()
    {
        return $this->hasOne(User::class, 'user_id', 'id');
    }
}
