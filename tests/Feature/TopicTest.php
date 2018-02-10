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

    public function setUp()
    {
        parent::setUp();
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

    public function testAnAuthorCanEditTheirTopic()
    {
        $topic = $this->topicHelper->newTopic();

        $this->be(User::find($topic->user->id));

        $edit['content'] = 'This is the new content of the topic.';

        $topic->updateTopic($edit);

        $this->assertEquals($topic->content, $edit['content']);
    }

    public function testAUserCannotEditAnotherUsersTopic()
    {
        $this->expectException('Symfony\Component\HttpKernel\Exception\HttpException');

        $topic = $this->topicHelper->newTopic();

        $user = $this->userHelper->newUser();

        $this->be($user);

        $edit['content'] = 'This is the new content of the topic.';

        $topic->updateTopic($edit);
    }
}
