<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Topic;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Helpers\ForumHelper;
use Tests\Helpers\TopicHelper;

class ForumTest extends TestCase
{
    use DatabaseTransactions;

    public function __construct()
    {
    	$this->forumHelper = new ForumHelper;
        $this->topicHelper = new TopicHelper;
    }

    public function testAForumCanHaveTopics()
    {
        $forum = $this->forumHelper->newForum();
        $topic = $this->topicHelper->newTopic();
        $topic->forum()->associate($forum);
        $this->assertEquals($forum->id, $topic->forum->id);
    }

    public function testATopicCanBeCreated()
    {
        $this->be(User::findOrFail(1));
    	$forum = $this->forumHelper->newForum();
        $input = collect(['title' => 'A topic title', 'content' => 'Some content text']);
    	$topic = $forum->createTopic($input);  
    	$this->assertEquals(Topic::all()->last()->title,'A topic title');
     }
}
