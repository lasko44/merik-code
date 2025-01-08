<?php

namespace App\Policies\Admin;

use App\Models\Component;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ComponentPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): Response
    {
        return  $user->isAdmin()
            ? Response::allow()
            : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can view the model.
     * @codeCoverageIgnore  //TODO Remove when used
     */
    public function view(User $user, Component $component): Response
    {
        return  $user->isAdmin()
            ? Response::allow()
            : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {

        return  $user->isAdmin()
            ? Response::allow()
            : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can update the model.
     * @codeCoverageIgnore  //TODO Remove when used
     */
    public function update(User $user, Component $component): Response
    {
        return  $user->isAdmin()
            ? Response::allow()
            : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can delete the model.
     * @codeCoverageIgnore  //TODO Remove when used
     */
    public function delete(User $user, Component $component): Response
    {
        return  $user->isAdmin()
            ? Response::allow()
            : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can restore the model.
     * @codeCoverageIgnore  //TODO Remove when used
     */
    public function restore(User $user, Component $component): Response
    {
        return  $user->isAdmin()
            ? Response::allow()
            : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can permanently delete the model.
     * @codeCoverageIgnore  //TODO Remove when used
     */
    public function forceDelete(User $user, Component $component): Response
    {
        return  $user->isAdmin()
            ? Response::allow()
            : Response::denyAsNotFound();
    }
}
