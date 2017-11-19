<?php

namespace Laralum\Addresses\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Laralum\Users\Models\User;

class SettingsPolicy
{
    use HandlesAuthorization;

    /**
     * Filters the authoritzation.
     *
     * @param mixed $user
     * @param mixed $ability
     */
    public function before($user, $ability)
    {
        if (User::findOrFail($user->id)->superAdmin()) {
            return true;
        }
    }

    /**
     * Determine if the current user can access the addresses module.
     *
     * @param mixed $user
     *
     * @return bool
     */
    public function access($user)
    {
        return User::findOrFail($user->id)->hasPermission('laralum::addresses.access');
    }

    /**
     * Determine if the current user can edit the addresses settings.
     *
     * @param mixed $user
     *
     * @return bool
     */
    public function update($user)
    {
        return User::findOrFail($user->id)->hasPermission('laralum::addresses.settings');
    }
}
