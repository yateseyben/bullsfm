<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\Topic;
use App\Models\User;
use Tests\TestCase;

class PostTest extends TestCase
{

    public function testAPostBelongsToATopic()
    {
        $topic = $this->giveMeATopic();

        $post = $this->giveMeAPost();

        $post->topic()->associate($topic);

        $this->AssertEquals($post->topic_id, $topic->id);
    }

    public function testAPostBelongsToAUser()
    {
        $user = $this->giveMeAUser();

        $post = $this->giveMeAPost();

        $post->user()->associate($user);

        $this->AssertEquals($post->user_id, $user->id);
    }

    /**
     * Returns a Post object
     *
     */
    public function giveMeAPost()
    {
        $topic = factory(Post::class)->make();

        return $topic;
    }

    /**
     * Returns a topic
     *
     */
    public function giveMeATopic()
    {
        $topic = factory(Topic::class)->make();

        return $topic;
    }

    /**
     * Returns a user
     */
    public function giveMeAUser()
    {
    	$user = factory(User::class)->make();

    	return $user;
    }
}
