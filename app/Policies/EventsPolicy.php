<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\event;
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
    public function viewAny(event $event)
    {
        //
        dd(11);
        return $event->hasPermissionTo('Read-Events')
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
    public function view(Admin $admin, event $event)
    {
        //
        dd(11);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Admin $admin)
    {
        //
        dd(11);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\event  $event
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Admin $admin, event $event)
    {
        //
        dd(11);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\event  $event
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Admin $admin, event $event)
    {
        //
        dd(11);
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
        dd(11);
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
        dd(11);
    }
}
