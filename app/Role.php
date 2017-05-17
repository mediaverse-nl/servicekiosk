<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';

    protected $guarded = [];

    public function userRole()
    {
        return $this->hasMany('App\UserRole', 'role_id');
    }


    public static function accountType()
    {
        return collect([
            'admin' => 'admin',
            'client' => 'client',
        ]);
    }
}
