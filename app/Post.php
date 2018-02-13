<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;
use App\User;

class Post extends Model
{
    protected $fillable = ['title', 'body', 'published', 'published_at', 'user_id'];
    protected $dates = ['published_at'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsto(User::class);
    }

    public function scopePublished($query)
    {
        return $query->where('published', 'true');
    }


    // public function create()
    // {
    //     Parent::
    // }
}
