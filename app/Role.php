<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = [];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permissions_roles');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'roles_users');
    }

}
