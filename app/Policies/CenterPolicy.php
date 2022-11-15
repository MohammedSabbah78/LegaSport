<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\center;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CenterPolicy
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
        return $user->hasPermissionTo('Read-Centers')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\center  $center
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, center $center)
    {
        //
        return $user->hasPermissionTo('Read-Centers')
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
        return $user->hasPermissionTo('Create-Center')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\center  $center
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update($user, center $center)
    {
        //
        return $user->hasPermissionTo('Update-Center')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\center  $center
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete($user, center $center)
    {
        //
        return $user->hasPermissionTo('Delete-Center')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\center  $center
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $admin, center $center)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\center  $center
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $admin, center $center)
    {
        //
    }
}
