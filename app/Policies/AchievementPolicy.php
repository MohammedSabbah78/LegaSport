<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\achievement;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AchievementPolicy
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

        return $user->hasPermissionTo('Read-Achievements')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\achievement  $achievement
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, achievement $achievement)
    {

        return $achievement->hasPermissionTo('Read-Achievements')
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
        return $user->hasPermissionTo('Create-Achievement')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\achievement  $achievement
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update($user, achievement $achievement)
    {
        //
        return $user->hasPermissionTo('Update-Achievement')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\achievement  $achievement
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete($user, achievement $achievement)
    {
        //
        return $user->hasPermissionTo('Delete-Achievement')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\achievement  $achievement
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $admin, achievement $achievement)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\achievement  $achievement
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $admin, achievement $achievement)
    {
        //
    }
}
