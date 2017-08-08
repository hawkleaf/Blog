<?php

namespace Api\Comment\Http\Transformers;

use Api\Post\Http\Transformers\PostTransformer;
use League\Fractal\TransformerAbstract;
use Api\User\Http\Transformers\UserTransformer;
use App\Comment;

class CommentTransformer extends TransformerAbstract
{
  protected $defaultIncludes = ['user', 'post'];

  public function transform(Comment $comment)
  {
    return [
        'id' => $comment->id,
        'body' => $comment->body,
    ];
  }

  public function includeUser(Comment $comment)
  {
      $user = $comment->user;

      return $this->item($user, new UserTransformer);
  }

  public function includePost(Comment $comment)
  {
      $post = $comment->post;

      return $this->item($post, new PostTransformer);
  }
}
