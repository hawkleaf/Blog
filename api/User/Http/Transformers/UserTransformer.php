<?php

namespace Api\User\Http\Transformers;

use Api\Comment\Http\Transformers\CommentTransformer;
use League\Fractal\TransformerAbstract;
use App\User;
use Api\Post\Http\Transformers\PostTransformer;

class UserTransformer extends TransformerAbstract
{
  public $availableIncludes = ['posts', 'comments'];

  public function transform(User $user)
  {
    return [
        'id' => $user->id,
        'name' => $user->name,
        'email' => $user->email
    ];
  }

  public function includePosts(User $user)
  {
      return $this->collection($user->posts, new PostTransformer);
  }

  public function includeComments(User $user)
  {
      return $this->collection($user->comments, new CommentTransformer);
  }
}
