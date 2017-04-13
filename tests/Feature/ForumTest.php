<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ForumTest extends TestCase
{
    use DatabaseMigrations;

    public function aForumCanHaveTopics()
    {
        $forum = $this->giveMeAForum();

    }
}
