<?php

namespace Api\Post\Http\Transformers;

use League\Fractal\TransformerAbstract;
use App\Post;
use Api\Comment\Http\Transformers\CommentTransformer;
use Api\User\Http\Transformers\UserTransformer;

class PostTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['comments', 'user'];

    public function transform(Post $post)
    {
        return [

            'id' => $post->id,
          'title'     => $post->title,
          'body'     => $post->body,
          'published_at' => $post->published_at
        ];
    }

    public function includeComments(Post $post)
    {
        $comments = $post->comments;

        return $this->collection($comments, new CommentTransformer);
    }

    public function includeUser(Post $post)
    {
        $user = $post->user;

        return $this->item($user, new UserTransformer);
    }

}
