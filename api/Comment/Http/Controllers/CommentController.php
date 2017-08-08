<?php

namespace Api\Comment\Http\Controllers;

use Illuminate\Http\Request;
use Api\ApiController;
use Api\Comment\Http\Transformers\CommentTransformer;
use Api\Comment\Http\Requests\CommentRequest;
use App\Comment;
use App\Post;

class CommentController extends ApiController
{
    public function show(Post $post, Comment $comment, CommentTransformer $transformer)
    {
        $comment->load('user');

        return $this->setPayload($transformer->transform($comment))->respond();
    }

    public function store(Post $post, CommentRequest $request, CommentTransformer $transformer)
    {
        $comment = Comment::create([
            'post_id' => $post->id,
            'user_id' => $request->user_id,
            'body' => $request->body
        ]);

        return $this->setPayload($transformer->transform($comment))->respond();
    }

    public function update(Post $post, Comment $comment, CommentRequest $request)
    {
        $comment->body = $request->body;
        $comment->save();

        return $this->respondWithSuccess();
    }

    public function destroy(Post $post, Comment $comment)
    {
        $comment->delete();

        return $this->respondWithSuccess();
    }
}
