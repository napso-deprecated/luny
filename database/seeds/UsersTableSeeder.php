<?php

use App\Comment;
use App\Page;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create 10 users
        $users = factory(User::class, 10)->create();

        // for each create user, create 10 pages.
        $users->each(function ($user) {

            $pages = factory(Page::class, 5)->create(['user_id' => $user->id]);

            // for each page create 10 comments from the user it self the created the page
            $pages->each(function ($page) {
                factory(Comment::class, 10)->create(['page_id' => $page->id]);
            });

        });


        // tags
        factory(\Napso\Lunytags\Models\Tag::class, 20)->create();


    }
}
