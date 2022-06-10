<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasFactory, SoftDeletes;

    const ROLE_ADMIN = 0;
    const ROLE_READER = 1;
    //const ROLE_MANAGER = 2;

    public static function getRoles()
    {
        return [
            self::ROLE_ADMIN => 'Admin',
            self::ROLE_READER => 'Reader',
            //self::ROLE_MANAGER => 'Manager',

        ];
    }

    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];
    protected $quardet = false;

}
