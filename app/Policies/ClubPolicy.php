<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\club;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClubPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny($user)
    {
        //
        return $user->hasPermissionTo('Read-Clubs')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\club  $club
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view($user, club $club)
    {
        //
        return $user->hasPermissionTo('Read-Clubs')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create($user)
    {
        //
        return $user->hasPermissionTo('Create-Club')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\club  $club
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update($user, club $club)
    {
        //
        return $user->hasPermissionTo('Update-Club')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\club  $club
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete($user, club $club)
    {
        //
        return $user->hasPermissionTo('Delete-Club')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\club  $club
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $admin, club $club)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\club  $club
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $admin, club $club)
    {
        //
    }
}
