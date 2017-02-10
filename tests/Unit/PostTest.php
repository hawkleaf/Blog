<?php

namespace Tests\Unit;

use App\Post;
use Tests\ApiTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostTest extends ApiTestCase
{
    public function test_it_fetches_posts()
    {
        //Arrange
        $this->makePost();

        //Act
        $this->getJson('api/posts');

        //Assert
        $this->assertResponseOk();
    }

    private function makePost($postFields = [])
    {
        $post = array_merge([

            'title' => $this->fake->sentence,
            'body' => $this->fake->paragraph,
            'published_at' => \Carbon\Carbon::now(),
            'user_id' => factory(\App\User::class)->make()->id

        ], $postFields);

        while($this->times--) Post::create($post);
    }
}
