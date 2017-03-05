<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;

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


    public function pages()
    {
        return $this->hasMany(Page::class);
    }

    public function avatar()
    {
        return 'https://www.gravatar.com/avatar/' . md5($this->email) . '?s=60&d=mm';
    }


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'roles_users');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permissions_users');
    }


    // Roles and Permissions
    // refactoring required

    public function hasRole($role)
    {
        if ($this->roles->contains('name', $role)) {
            return true;
        }
        return false;
    }

    public function hasPermission(Permission $permission)
    {
        return $this->hasPermissionThroughUserRole($permission) || $this->hasPermissionThroughUserPermissions($permission);
    }

    public function hasPermissionThroughUserPermissions(Permission $permission)
    {
        return (bool)$this->permissions->where('name', $permission->name)->count();
    }


    protected function hasPermissionThroughUserRole($permission)
    {
        foreach ($permission->roles as $role) {
            if ($this->roles->contains($role)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param array $permissions
     * @return Collection
     */
    protected function getAllPermissions(array $permissions)
    {
        return Permission::whereIn('name', $permissions)->get();
    }

    public function givePermissionTo(...$permissions)
    {
        $permissionsGiven = array_flatten($permissions);
        $permissionsFound = $this->getAllPermissions($permissionsGiven);

        if ($permissionsFound->isEmpty() || count($permissionsGiven) !== count($permissionsFound)) {
            return false;
        }

        foreach ($permissionsFound as $permission) {
            if (!$this->permissions->contains($permission)) {
                $this->permissions()->save($permission);
            }
        }

        return true;

    }

    public function withdrawPermissionTo(...$permissions)
    {
        $permissions = $this->getAllPermissions(array_flatten($permissions));

        $this->permissions()->detach($permissions);

        return $this;
    }

    public function updatePermissions(...$permissions)
    {
        $this->permissions()->detach();

        return $this->givePermissionTo($permissions);
    }


}
