<?php

namespace Api\Post\Http\Controllers;

use Illuminate\Http\Request;
use Api\ApiController;
use App\Post;
use Api\Post\Http\Requests\PostRequest;
use Api\Post\Http\Transformers\PostTransformer;
use Api\Post\Http\Transformers\PostCommentTransformer;

class PostController extends ApiController
{
    public function index(PostTransformer $transformer, Request $request)
    {
        $posts = fractal()->collection(Post::all())->parseIncludes($request->include)->transformWith($transformer);

        return $this->setPayload($posts)->respond();
    }

    public function show(Post $post, PostTransformer $transformer, Request $request)
    {
        $post = fractal()->item($post)->parseIncludes($request->include)->transformWith($transformer);

        return $this->setPayload($post)->respond();
    }

    public function store(PostRequest $request)
    {
        //Auth::user()->posts()->create([
        Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'published_at' => \Carbon\Carbon::now(),
            'user_id' => 1
        ]);

        return $this->respondWithSuccess();
    }

    public function update(Post $post, PostRequest $request)
    {
        $this->authorize('owner', $post);

        $post->body = $request->body;
        $post->title = $request->title;

        $post->save();
    }

    public function destroy(Post $post)
    {
        $post->comments->each->delete();

        $post->delete();

        return $this->respondWithSuccess();
    }
}
