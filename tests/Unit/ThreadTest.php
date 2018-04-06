<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ThreadTest extends TestCase
{
    use RefreshDatabase;

    protected $thread;

    public function setUp()
    {
        parent::setUp();

        $this->thread = factory('App\Models\Thread')->create();
    }

    public function testThreadHasReplies()
    {
        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection', 
            $this->thread->replies
        );
    }

    public function testThreadHasCreator()
    {
        $this->assertInstanceOf(
            'App\Models\User', 
            $this->thread->creator
        );
    }

    public function testThreadCanAddaReply()
    {
        $this->thread->addReply([
            'body' => 'lorem ipsum',
            'user_id' => 1
        ]);

        $this->assertCount(1, $this->thread->replies);
    }
}