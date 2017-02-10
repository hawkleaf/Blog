<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Api\Posts\Http\Requests\PostRequest;
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
            'published_at' => Carbon::now()
        ]);
        return redirect('/');
    }
}
