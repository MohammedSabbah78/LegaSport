<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Taskesforpoint;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskesforpointPolicy
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
        return $user->hasPermissionTo('Read-Taskes_For_Points')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Taskesforpoint  $taskesforpoint
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view($user, Taskesforpoint $taskesforpoint)
    {
        //
        return $user->hasPermissionTo('Read-Taskes_For_Points')
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
        return $user->hasPermissionTo('Create-Taskes_For_Point')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Taskesforpoint  $taskesforpoint
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update($user, Taskesforpoint $taskesforpoint)
    {
        //
        return $user->hasPermissionTo('Update-Taskes_For_Point')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Taskesforpoint  $taskesforpoint
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete($user, Taskesforpoint $taskesforpoint)
    {

        return $user->hasPermissionTo('Delete-Taskes_For_Point')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Taskesforpoint  $taskesforpoint
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $admin, Taskesforpoint $taskesforpoint)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Taskesforpoint  $taskesforpoint
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $admin, Taskesforpoint $taskesforpoint)
    {
        //
    }
}
