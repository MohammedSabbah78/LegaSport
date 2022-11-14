<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\term;
use Illuminate\Auth\Access\HandlesAuthorization;

class TermPolicy
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
        return $user->hasPermissionTo('Read-Terms')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\term  $term
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view($user, term $term)
    {
        //
        return $user->hasPermissionTo('Read-Terms')
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
        return $user->hasPermissionTo('Create-Term')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\term  $term
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update($user, term $term)
    {
        //
        return $user->hasPermissionTo('Update-Term')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\term  $term
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete($user, term $term)
    {
        //
        return $user->hasPermissionTo('Delete-Term')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\term  $term
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore($admin, term $term)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\term  $term
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $admin, term $term)
    {
        //
    }
}
