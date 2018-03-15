<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Api\Post\Http\Requests\PostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use Carbon\Carbon;
use Auth;

class PostController extends Controller
{
    public function create()
    {
        return view('post.create');
    }

    public function store(PostRequest $request)
    {
        Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => Auth::user()->id,
            'published' => $request->published,
            'published_at' => Carbon::now()
        ]);
        return redirect('/');
    }

    public function show(Post $post)
    {
        $post->load('comments.user');

        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    public function destroy(Post $post)
    {
        $this->authorize('owner', $post);

        $post->delete();

        return redirect()->route('post.index');
    }

    public function update(Post $post, UpdatePostRequest $request)
    {
        $post->update($request->validated());

        return redirect()->route('post.index');
    }
}
