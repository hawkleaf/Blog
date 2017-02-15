<?php

namespace App\Policies;

use App\User;
use App\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        
    }

    public function owner(User $user, Post $post)
    {
        if ($user->id == $post->user_id)
        {
            return true;
        }
        return false;
    }
}