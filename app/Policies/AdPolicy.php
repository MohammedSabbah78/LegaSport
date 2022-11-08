<?php

namespace App\Policies;

use App\Models\Ad;
use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdPolicy
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
        return $user->hasPermissionTo('Read-Ads')  ? $this->allow() : $this->deny();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\odel=Ad  $odel=Ad
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view($user, Ad $ad)
    {
        return $user->hasPermissionTo('Read-Ads')  ? $this->allow() : $this->deny();
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create($user)
    {
        return $user->hasPermissionTo('Create-Ad')  ? $this->allow() : $this->deny();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\odel=Ad  $odel=Ad
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update($user, Ad $ad)
    {
        return $user->hasPermissionTo('Update-Ad')  ? $this->allow() : $this->deny();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\odel=Ad  $odel=Ad
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete($user, Ad $ad)
    {
        return $user->hasPermissionTo('Delete-Ad')  ? $this->allow() : $this->deny();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\odel=Ad  $odel=Ad
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore($user, Ad $ad)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\odel=Ad  $odel=Ad
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete($user, Ad $ad)
    {
        //
    }
}
