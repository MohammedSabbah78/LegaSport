<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\event;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventsPolicy
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
        return $user->hasPermissionTo('Read-Events')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\event  $event
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view($user, event $event)
    {
        //
        return $user->hasPermissionTo('Read-Events')
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
        return $user->hasPermissionTo('Create-Event')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\event  $event
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update($user, event $event)
    {
        //
        return $user->hasPermissionTo('Update-Event')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\event  $event
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete($user, event $event)
    {
        //
        return $user->hasPermissionTo('Delete-Event')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\event  $event
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $admin, event $event)
    {

        //

    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\event  $event
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $admin, event $event)
    {
        //

    }
}
