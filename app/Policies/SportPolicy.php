<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Sport;
use Illuminate\Auth\Access\HandlesAuthorization;

class SportPolicy
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
        return $user->hasPermissionTo('Read-Sports')  ? $this->allow() : $this->deny();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\odel=Sport  $odel=Sport
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view($user, Sport $sport)
    {
        return $user->hasPermissionTo('Read-Sports')  ? $this->allow() : $this->deny();
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create($user)
    {
        return $user->hasPermissionTo('Create-Sport')  ? $this->allow() : $this->deny();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\odel=Sport  $odel=Sport
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update($user, Sport $sport)
    {
        return $user->hasPermissionTo('Update-Sport')  ? $this->allow() : $this->deny();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\odel=Sport  $odel=Sport
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete($user, Sport $sport)
    {
        return $user->hasPermissionTo('Delete-Sport')  ? $this->allow() : $this->deny();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\odel=Sport  $odel=Sport
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore($user, Sport $sport)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\odel=Sport  $odel=Sport
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete($user, Sport $sport)
    {
        //
    }
}
