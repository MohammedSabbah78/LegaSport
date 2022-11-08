<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Language;
use Illuminate\Auth\Access\HandlesAuthorization;

class LanguagePolicy
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
        return $user->hasPermissionTo('Read-Languages')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\odel=Language  $odel=Language
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view($user, Language $language)
    {
        return $user->hasPermissionTo('Read-Languages')
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
        return $user->hasPermissionTo('Create-Language')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }


    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\odel=Language  $odel=Language
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update($user, Language $language)
    {
        return $user->hasPermissionTo('Update-Language')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\odel=Language  $odel=Language
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete($user, Language $language)
    {
        return $user->hasPermissionTo('Delete-Language')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\odel=Language  $odel=Language
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore($user, Language $language)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\odel=Language  $odel=Language
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete($user, Language $language)
    {
        //
    }
}
