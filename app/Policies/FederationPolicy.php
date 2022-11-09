<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Federation;
use Illuminate\Auth\Access\HandlesAuthorization;

class FederationPolicy
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
        return $user->hasPermissionTo('Read-Federations')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Federation  $federation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view($user, Federation $federation)
    {
        //
        return $user->hasPermissionTo('Read-Federations')
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
        return $user->hasPermissionTo('Create-Federation')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Federation  $federation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update($user, Federation $federation)
    {
        //
        return $user->hasPermissionTo('Update-Federation')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Federation  $federation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete($user, Federation $federation)
    {
        //
        return $user->hasPermissionTo('Delete-Federation')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Federation  $federation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $admin, Federation $federation)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Federation  $federation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $admin, Federation $federation)
    {
        //
    }
}
