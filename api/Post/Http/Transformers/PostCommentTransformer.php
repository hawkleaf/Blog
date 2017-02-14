<?php

namespace Api\Post\Http\Transformers;

class PostCommentTransformer
{

  public function transform($result)
  {

    return $result->map(function($comment) {
        return [
            'body' => $comment->body,
            'created_at' => $comment->created_at,
            'user' => $comment->user
        ];
    });
  }

}
