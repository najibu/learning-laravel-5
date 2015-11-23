<?php

namespace App;

trait HasRoles {
	public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    // $user->hasRole('manager')
    public function hasRole($role)
    {
        if (is_string($role))
        {
            return $this->roles->contains('name', $role);
        }

        return !! $role->intersect($this->roles)->count();

        // foreach ($role as $r) {
        //     if ($this->hasRole($r->name) {
        //         return true;
        //     });
        // }

        // return false;
    }

    public function assignRole($role)
    {
        return $this->roles()->save(
            Role::whereName($role)->firstOrFail()
        );
    }
}