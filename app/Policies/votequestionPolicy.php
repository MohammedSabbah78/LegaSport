<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\votequestion;
use Illuminate\Auth\Access\HandlesAuthorization;

class votequestionPolicy
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
        return $user->hasPermissionTo('Read-Vote_Questions')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\votequestion  $votequestion
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view($user, votequestion $votequestion)
    {
        //
        return $user->hasPermissionTo('Read-Vote_Questions')
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
        return $user->hasPermissionTo('Create-Vote_Question')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }


    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\votequestion  $votequestion
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update($user, votequestion $votequestion)
    {
        //
        return $user->hasPermissionTo('Update-Vote_Question')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\votequestion  $votequestion
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete($user, votequestion $votequestion)
    {
        //
        return $user->hasPermissionTo('Delete-Vote_Question')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\votequestion  $votequestion
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $admin, votequestion $votequestion)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\votequestion  $votequestion
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $admin, votequestion $votequestion)
    {
        //
    }
}
