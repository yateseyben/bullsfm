<?php

namespace Tests\Feature;

use App\Models\Forum;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Helpers\ForumHelper;
use Tests\Helpers\PostHelper;
use Tests\Helpers\TopicHelper;
use Tests\Helpers\UserHelper;
use Tests\TestCase;

class PostTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * constructor
     * @param
     */
    public function __construct()
    {
        $this->postHelper = new PostHelper;
        $this->forumHelper = new ForumHelper;
        $this->topicHelper = new TopicHelper;
        $this->userHelper = new UserHelper;
    }

    public function testAPostCanBeDeleted()
    {
        $post = $this->postHelper->newPost();

        $post->delete();

        $this->assertNotNull($post->deleted_at);
    }

    public function testAPostBelongsToATopic()
    {
        $topic = $this->topicHelper->newTopic();

        $post = $this->postHelper->newPost();

        $post->topic()->associate($topic);

        $this->AssertEquals($post->topic_id, $topic->id);
    }

    public function testAPostBelongsToAUser()
    {
        $user = $this->userHelper->newUser();

        $post = $this->postHelper->newPost();

        $post->user()->associate($user);

        $this->AssertEquals($post->user_id, $user->id);
    }

    public function testAUserCanEditTheirTopic()
    {
        $post = $this->postHelper->newPost();

        $this->be($post->user);

        $input = ['content' => 'Some edited content.'];

        $post->updatePost($input);

        $this->AssertEquals($post->content, 'Some edited content.');
    }

    public function testAUserCannotEditAnotherUsersPost()
    {
        $this->expectException('Symfony\Component\HttpKernel\Exception\HttpException');

        $randomUser = $this->userHelper->newUser();

        $post = $this->postHelper->newPost();

        $this->be($randomUser);

        $input = ['content' => 'Some edited content.'];

        $post->updatePost($input);
    }
}
