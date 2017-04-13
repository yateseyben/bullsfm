<?php

namespace Tests\Feature;

use App\Models\Topic;
use App\Models\User;
use Tests\Helpers\PostHelper;
use Tests\Helpers\TopicHelper;
use Tests\Helpers\UserHelper;
use Tests\TestCase;

class TopicTest extends TestCase
{
    public function __construct()
    {
        $this->postHelper = new PostHelper;
        $this->topicHelper = new TopicHelper;
        $this->userHelper = new UserHelper;
    }

    public function testATopicBelongsToAUser()
    {
        $topic = $this->topicHelper->newTopic();

        $user = $this->userHelper->newUser();

        $topic->user()->associate($user);

        $this->assertEquals($topic->user_id, $user->id);
    }
}
