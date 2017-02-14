<?php

namespace Api\Comment\Http\Transformers;

class CommentTransformer
{

  public function transform($result)
  {
    return [
        'body' => $result->body,
        'user' => $result->user
    ];
  }
}
