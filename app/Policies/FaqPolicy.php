<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\faq;
use Illuminate\Auth\Access\HandlesAuthorization;

class FaqPolicy
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
        return $user->hasPermissionTo('Read-Faqs')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\faq  $faq
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view($user, faq $faq)
    {
        //
        return $user->hasPermissionTo('Read-Faqs')
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
        return $user->hasPermissionTo('Create-Faq')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\faq  $faq
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update($user, faq $faq)
    {
        //
        return $user->hasPermissionTo('Update-Faq')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\faq  $faq
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete($user, faq $faq)
    {
        //
        return $user->hasPermissionTo('Delete-Faq')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\faq  $faq
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $admin, faq $faq)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\faq  $faq
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $admin, faq $faq)
    {
        //
    }
}
