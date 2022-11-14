<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\policie;
use Illuminate\Auth\Access\HandlesAuthorization;

class PoliciePolicy
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
        return $user->hasPermissionTo('Read-Policies')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\policie  $policie
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view($user, policie $policie)
    {
        //
        return $user->hasPermissionTo('Read-Policies')
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
        return $user->hasPermissionTo('Create-Policie')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\policie  $policie
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update($user, policie $policie)
    {
        //
        return $user->hasPermissionTo('Update-Policie')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\policie  $policie
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete($user, policie $policie)
    {
        //
        return $user->hasPermissionTo('Delete-Policie')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\policie  $policie
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore($admin, policie $policie)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\policie  $policie
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete($admin, policie $policie)
    {
        //
    }
}
