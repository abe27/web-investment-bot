<?php

namespace App\Models;

use App\Traits\Nanoids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Profile extends Model
{
    use HasFactory, HasApiTokens, Nanoids;

    public $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'api_token',
        'user_class',
        'profit_percent',
        'anti_spam_code',
        'avatar_url',
    ];

    protected $casts = [
        'api_token' => 'array',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
