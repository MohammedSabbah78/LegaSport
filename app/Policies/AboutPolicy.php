<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\about;
use Illuminate\Auth\Access\HandlesAuthorization;

class AboutPolicy
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
        return $user->hasPermissionTo('Read-Abouts')
            ? $this->allow()

            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\about  $about
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view($user, about $about)
    {
        //
        return $user->hasPermissionTo('Read-Abouts')
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
        return $user->hasPermissionTo('Create-About')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\about  $about
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update($user, about $about)
    {
        //
        return $user->hasPermissionTo('Update-About')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\about  $about
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete($user, about $about)
    {
        //
        return $user->hasPermissionTo('Delete-About')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\about  $about
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $admin, about $about)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\about  $about
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $admin, about $about)
    {
        //
    }
}
