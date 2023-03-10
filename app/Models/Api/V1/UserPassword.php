<?php

namespace App\Models\Api\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPassword extends Model
{
    use HasFactory;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $table = 'users_passwords';
    protected $fillable = [
        'website',
        'username',
        'password',
        'created_at',
        'updated_at',
        'user_id'
    ];
}
