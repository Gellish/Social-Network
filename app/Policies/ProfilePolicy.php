<?php

namespace App\Policies;

use App\user;
use App\profile;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProfilePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the profile.
     *
     * @param  \App\user  $user
     * @param  \App\profile  $profile
     * @return mixed
     */
    public function view(user $user, profile $profile)
    {
        //
    }

    /**
     * Determine whether the user can create profiles.
     *
     * @param  \App\user  $user
     * @return mixed
     */
    public function create(user $user)
    {
        //
    }

    /**
     * Determine whether the user can update the profile.
     *
     * @param  \App\user  $user
     * @param  \App\profile  $profile
     * @return mixed
     */
    public function update(user $user, profile $profile)
    {
        return $user->id == $profile->user_id;
    }

    /**
     * Determine whether the user can delete the profile.
     *
     * @param  \App\user  $user
     * @param  \App\profile  $profile
     * @return mixed
     */
    public function delete(user $user, profile $profile)
    {
        //
    }

    /**
     * Determine whether the user can restore the profile.
     *
     * @param  \App\user  $user
     * @param  \App\profile  $profile
     * @return mixed
     */
    public function restore(user $user, profile $profile)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the profile.
     *
     * @param  \App\user  $user
     * @param  \App\profile  $profile
     * @return mixed
     */
    public function forceDelete(user $user, profile $profile)
    {
        //
    }
}
