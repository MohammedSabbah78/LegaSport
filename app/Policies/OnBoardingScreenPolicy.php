<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\OnBoardingScreen;
use Illuminate\Auth\Access\HandlesAuthorization;

class OnBoardingScreenPolicy
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
        return $user->hasPermissionTo('Read-On-Boardings')  ? $this->allow() : $this->deny();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\odel=OnBoardingScreen  $odel=OnBoardingScreen
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view($user, OnBoardingScreen $onBoardingScreen)
    {
        return $user->hasPermissionTo('Read-On-Boardings')  ? $this->allow() : $this->deny();
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create($user)
    {
        return $user->hasPermissionTo('Create-On-Boarding')  ? $this->allow() : $this->deny();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\odel=OnBoardingScreen  $odel=OnBoardingScreen
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update($user, OnBoardingScreen $onBoardingScreen)
    {
        return $user->hasPermissionTo('Update-On-Boarding')  ? $this->allow() : $this->deny();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\odel=OnBoardingScreen  $odel=OnBoardingScreen
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete($user, OnBoardingScreen $onBoardingScreen)
    {
        return $user->hasPermissionTo('Delete-On-Boarding')  ? $this->allow() : $this->deny();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\odel=OnBoardingScreen  $odel=OnBoardingScreen
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore($user, OnBoardingScreen $onBoardingScreen)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\odel=OnBoardingScreen  $odel=OnBoardingScreen
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete($user, OnBoardingScreen $onBoardingScreen)
    {
        //
    }
}
