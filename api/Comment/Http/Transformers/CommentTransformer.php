<?php

namespace Api\Comment\Http\Transformers;

use League\Fractal\TransformerAbstract;
use Api\User\Http\Transformers\UserTransformer;
use App\Comment;

class CommentTransformer extends TransformerAbstract
{
  protected $defaultIncludes = ['user'];

  public function transform(Comment $comment)
  {
    return [
        'body' => $comment->body,
    ];
  }

  public function includeUser(Comment $comment)
  {
      $user = $comment->user;

      return $this->item($user, new UserTransformer);
  }
}
