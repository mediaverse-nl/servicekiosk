<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function console()
    {
        return $this->hasMany('App\Console', 'user_id');
    }

    public function userRole()
    {
        return $this->hasMany('App\UserRole', 'user_id');
    }

    public function password()
    {
        return $this->hasOne('App\Password');
    }

    public function client()
    {
        return $this->hasMany('App\Client', 'user_id');
    }

    public function ticket()
    {
        return $this->hasMany('App\Ticket', 'user_id');
    }

    public static function geslacht(){
        return collect([
            'Man' => 'Man',
            'Vrouw' => 'Vrouw',
        ]);
    }

    public static function status(){
        return collect([
            'Online' => 'Online',
            'Offline' => 'Offline',
            'Banned' => 'Banned',
        ]);
    }
}
