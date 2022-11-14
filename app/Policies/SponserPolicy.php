<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\sponser;
use Illuminate\Auth\Access\HandlesAuthorization;

class SponserPolicy
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
        return $user->hasPermissionTo('Read-Sponsers')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\sponser  $sponser
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view($user, sponser $sponser)
    {
        //
        return $user->hasPermissionTo('Read-Sponsers')
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
        return $user->hasPermissionTo('Create-Sponser')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\sponser  $sponser
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update($user, sponser $sponser)
    {
        //
        return $user->hasPermissionTo('Update-Sponser')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\sponser  $sponser
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete($user, sponser $sponser)
    {
        //
        return $user->hasPermissionTo('Delete-Sponser')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\sponser  $sponser
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $admin, sponser $sponser)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\sponser  $sponser
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $admin, sponser $sponser)
    {
        //
    }
}
