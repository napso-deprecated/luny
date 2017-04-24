<?php

namespace App\Services;

use App\Role;

class RolesManager
{


    public function refreshAllRoles($roles, $user)
    {
        if (!empty($roles)) {
            $roles = $this->getAllRoles($roles);
            // first remove all user previous roles
            $user->roles()->detach();
            // and apply the new ones
            $user->roles()->attach($roles);
        } else {
            // if roles is empty, we should delete all previous user roles.
            $user->roles()->detach();
        }

    }

    /**
     * @param array $roles
     * @return Collection
     */
    public function getAllRoles(array $roles)
    {
        return Role::whereIn('name', $roles)->get();
    }


}
