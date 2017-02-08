<?php

use Illuminate\Database\Seeder;

class UserPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create a single App\User instance...
        factory(App\User::class)->create();
        factory(App\Post::class, 20)->create();
        factory(App\Comment::class, 100)->create();
    }
}
