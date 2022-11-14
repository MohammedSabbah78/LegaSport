<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\mercato;
use Illuminate\Auth\Access\HandlesAuthorization;

class MercatoPolicy
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
        return $user->hasPermissionTo('Read-Mercatos')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\mercato  $mercato
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view($user, mercato $mercato)
    {
        //
        return $user->hasPermissionTo('Read-Mercatos')
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
        return $user->hasPermissionTo('Create-Mercato')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\mercato  $mercato
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update($user, mercato $mercato)
    {
        return $user->hasPermissionTo('Update-Mercato')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\mercato  $mercato
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete($user, mercato $mercato)
    {
        //
        return $user->hasPermissionTo('Delete-Mercato')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\mercato  $mercato
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $admin, mercato $mercato)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\mercato  $mercato
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $admin, mercato $mercato)
    {
        //
    }
}
