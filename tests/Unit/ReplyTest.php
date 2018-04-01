<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReplyTest extends TestCase
{
    use RefreshDatabase;

    public function testReplyHasOwner()
    {
        $reply = factory('App\Models\Reply')->create();
        $this->assertInstanceOf('App\Models\User', $reply->owner);
    }
}