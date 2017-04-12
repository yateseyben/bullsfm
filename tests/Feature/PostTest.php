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

    public function testAPostBelongsToAForum()
    {
        $user = $this->giveMeAForum();

        $post = $this->giveMeAPost();

        $post->forum()->associate($forum);

        $this->AssertEquals($post->forum_id, $forum->id);
    }

    /**
     * Returns a Post object
     *
     */
    public function giveMeAPost()
    {
        return factory(Post::class)->make();
    }

    /**
     * Returns a forum
     *
     */
    public function giveMeAForum()
    {
        return factory(Forum::class)->make();
    }

    /**
     * Returns a topic
     *
     */
    public function giveMeATopic()
    {
        return factory(Topic::class)->make();
    }

    /**
     * Returns a user
     */
    public function giveMeAUser()
    {
        return factory(User::class)->make();
    }
}
