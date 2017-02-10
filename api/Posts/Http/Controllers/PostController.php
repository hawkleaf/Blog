<?php

namespace Api\Posts\Http\Controllers;

use Illuminate\Http\Request;
use Api\ApiController;
use App\Post;
use Api\Posts\Http\Requests\PostRequest;
use Api\Posts\Http\Transformers\PostTransformer;

class PostController extends ApiController
{
    public function index(PostTransformer $transformer)
    {
        $posts = Post::all()->map(function($post) use ($transformer){
            return $transformer->transform($post);
        });
       return $this->setPayload($posts)->respond();
    }

    public function show(Post $post)
    {
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
}
