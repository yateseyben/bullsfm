<?php
namespace Tests\Helpers;

use App\Models\Post;

class PostHelper
{

    /**
     * Returns a Post object
     *
     */
    public function newPost()
    {
        return factory(Post::class)->create();
    }
}
