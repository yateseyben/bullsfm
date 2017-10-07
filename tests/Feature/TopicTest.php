<?php

namespace Tests\Feature;

use App\Models\Topic;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Helpers\PostHelper;
use Tests\Helpers\TopicHelper;
use Tests\Helpers\UserHelper;
use Tests\TestCase;

class TopicTest extends TestCase
{
    use DatabaseTransactions;

    public function __construct()
    {
        $this->postHelper = new PostHelper;
        $this->topicHelper = new TopicHelper;
        $this->userHelper = new UserHelper;
    }

    /**
    * @test
    */
    public function testATopicBelongsToAUser()
    {
        $topic = $this->topicHelper->newTopic();

        $user = $this->userHelper->newUser();

        $topic->user()->associate($user);

        $this->assertEquals($topic->user_id, $user->id);
    }


}
