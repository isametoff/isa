<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
    use Notifiable, HasFactory, SoftDeletes;

    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        // 'role',
    ];
    protected $quardet = false;

}
