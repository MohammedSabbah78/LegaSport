<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\offer;
use Illuminate\Auth\Access\HandlesAuthorization;

class OfferPolict
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
        return $user->hasPermissionTo('Read-Offers')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\offer  $offer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view($user, offer $offer)
    {
        //
        //
        return $user->hasPermissionTo('Read-Offers')
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
        return $user->hasPermissionTo('Create-Offer')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\offer  $offer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update($user, offer $offer)
    {
        //
        return $user->hasPermissionTo('Update-Offer')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\offer  $offer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete($user, offer $offer)
    {
        //
        return $user->hasPermissionTo('Delete-Offer')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\offer  $offer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore($admin, offer $offer)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\offer  $offer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete($admin, offer $offer)
    {
        //
    }
}
