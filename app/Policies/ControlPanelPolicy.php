<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ControlPanelPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->roles->containsStrict('id', Role::IS_ADMIN) || $user->roles->containsStrict('id', Role::IS_SUPPORT);
    }

    /**
     * @param User $user
     * @return false
     */
    public function view(User $user)
    {
        return false;
    }

    /**
     * @param User $user
     * @return void
     */
    public function create(User $user)
    {
        return $user->roles->containsStrict('id', Role::IS_ADMIN);
    }

    /**
     * @param User $user
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->roles->containsStrict('id', Role::IS_ADMIN);
    }

    /**
     * @param User $user
     * @return void
     */
    public function delete(User $user)
    {
        return $user->roles->containsStrict('id', Role::IS_MANAGER);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @return bool
     */
    public function restore(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     */
    public function forceDelete(User $user)
    {
        return $user->roles->containsStrict('id', Role::IS_ADMIN);
    }
}
