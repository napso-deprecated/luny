<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CommentsTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function comment_belongs_to_a_user()
    {
        // create 10 users, as our comments factory always gives the comments to user id's 1 to 10 (change later)
        $users = factory('App\User', 10)->create();

        // now create a comment the will be associated to one of the 10 users
        $comment = factory('App\Comment')->create();

        $this->assertInstanceOf('App\User', $comment->user);

    }

}
