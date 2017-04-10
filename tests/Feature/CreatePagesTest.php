<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreatePagesTest extends TestCase
{

    use DatabaseMigrations;


    /**
     * @test
     * This test covers the page creation from the point the form is submitted
     * The form itself is not tested
     */
    public function an_authenticated_user_can_create_new_pages()
    {
        // given we have signed in
        $this->be($user = factory('App\User')->create());
        // when we create a page
        $page = factory('App\Page')->make(['user_id' => $user->id]);
        // then when we visit the page page
        $this->post('/pages', $page->toArray());
        // we should see the new page
        $response = $this->get('/pages/' . $page->uri);

        $response->assertsee($page->title);
        $response->assertsee($page->body);

    }


    /**
     * @test
     * Guests cannot
     * 1. see the create form
     * 2. post to /pages
     */
    public function guests_cannot_create_a_page()
    {
        // let laravel handle the exception and redirect the user.
        // instead of throwing the exception directly as we usually do in the tests.
        $this->withExceptionHandling();

        // guests cannot see the create form
        $response = $this->get('/pages/create');

        $response->assertRedirect('login');

        // guests cannot post to /pages
        $response = $this->post('/pages');

        $response->assertRedirect('login');

    }



}
