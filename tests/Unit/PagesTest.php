<?php

namespace Tests\Unit;

use App\Page;
use Napso\Lunytags\LunyTagsServiceProvider;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PagesTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function a_page_has_comments()
    {
        $page = factory('App\Page')->create();
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $page->comments);
    }

    /**
     * @test
     */
    public function a_page_belongs_to_a_user()
    {
        $page = factory('App\Page')->create();
        $this->assertInstanceOf('App\User', $page->user);
    }

    /**
     * @test
     */
    public function a_page_can_add_a_comment()
    {
        /* @var Page $page */
        $page = factory('App\Page')->create();

        $page->addComment('this is the comment body', $page->user->id);
        $page->addComment('this is the second comment body', $page->user->id);

        $this->assertCount(2, $page->comments);
    }

}
