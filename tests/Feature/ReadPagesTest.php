<?php

namespace Tests\Feature;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ReadPagesTest extends TestCase
{

    use DatabaseMigrations;


    protected function setUp()
    {
        parent::setUp();
        $this->page = factory('App\Page')->create();
        $this->admin = factory('App\User', 'admin')->create();
    }


    /**
     * @test
     */
    public function a_user_can_view_all_pages()
    {
        $response = $this->get('/');

        $response->assertsee($this->page->title);

        $response = $this->get('/pages/' . $this->page->uri);

        $response->assertsee($this->page->body);
        $response->assertsee($this->page->title);
    }

    /**
     * @test
     */
    public function a_user_can_view_a_single_page()
    {
        $response = $this->get('/pages/' . $this->page->uri);

        $response->assertsee($this->page->body);
        $response->assertsee($this->page->title);
    }

    /**
     * @test
     */
    public function a_user_can_see_comments_that_are_associated_with_a_page_and_a_user()
    {
        // add a comment that belongs to the admin user
        $comment = factory('App\Comment')->create(['page_id' => $this->page->id, 'user_id' => $this->admin->id]);

        $response = $this->get('/pages/' . $this->page->uri);

        $response->assertsee($comment->body);

    }

    /**
     * @test
     */
    public function non_authenticated_user_cannot_comment_to_a_page()
    {
        // given we have authenticated user and a page
        // when the user add a comment
        // then the comment should be displayed in the page


        $this->expectException('Illuminate\Auth\AuthenticationException');
        $page = factory('App\Page')->create();
        $comment = factory('App\Comment')->make(['page_id' => $page->id]);

        $this->post('/pages/' . $this->page->uri . '/comments', $comment->toArray());

    }

    /**
     * @test
     */
    public function authenticated_user_can_comment_to_a_page()
    {
        //$user = factory('App\User')->create();
        $this->be($user = factory('App\User')->create());

        $page = factory('App\Page')->create(['user_id' => $user->id]);


        $comment = factory('App\Comment')->make(['page_id' => $page->id, 'user_id' => $user->id]);
        // he should not have the ability to add a comment

        $this->post('/pages/' . $this->page->uri . '/comments', $comment->toArray());

        $response = $this->get('/pages/'. $this->page->uri);

        $response->assertsee($comment->body);

    }


}
