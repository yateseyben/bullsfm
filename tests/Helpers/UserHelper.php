<?php
namespace Tests\Helpers;

use App\Models\User;
use App\Models\Role;

class UserHelper
{
    /**
     * Returns a Post object
     *
     */
    public function newUser()
    {
        return factory(User::class)->create();
    }

    /**
     * Returns a Post object
     *
     * @return App\Models\User
     */
    public function newModerator()
    {
        $user = $this->newUser();
        $user->assignRole('Moderator');
        return $user;
    }
}
