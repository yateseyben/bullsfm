<?php
namespace Tests\Helpers;

use App\Models\User;

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
}
