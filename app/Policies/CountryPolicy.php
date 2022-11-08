<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Country;
use Illuminate\Auth\Access\HandlesAuthorization;

class CountryPolicy
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
        return $user->hasPermissionTo('Read-Countries')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\odel=Country  $odel=Country
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view($user, Country $country)
    {
        return $user->hasPermissionTo('Read-Countries')
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
        return $user->hasPermissionTo('Create-Country')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\odel=Country  $odel=Country
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update($user, Country $country)
    {
        return $user->hasPermissionTo('Update-Country')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\odel=Country  $odel=Country
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete($user, Country $country)
    {
        return $user->hasPermissionTo('Delete-Country')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\odel=Country  $odel=Country
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore($user, Country $country)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\odel=Country  $odel=Country
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete($user, Country $country)
    {
        //
    }
}
