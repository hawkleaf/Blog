<?php

namespace Api\Posts\Http\Transformers;

class PostTransformer
{

  public function transform($result)
  {
    return [
      'title'     => $result->title,
      'body'     => $result->body,
      'published_at' => $result->published_at
    ];
  }

}
