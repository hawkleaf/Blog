@extends('layouts.app')

@section('content')
    <example></example>
    <div class="col-md-8 col-md-offset-2">
        @foreach($posts as $post)
            <div class="panel panel-default">

                <div class="panel-heading"><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></div>

                <div class="panel-body">
                    {{  $post->body }}
                </div>

                <div class="panel-footer">{{ $post->published_at->diffForHumans() }}</div>

            </div>
        @endforeach
    </div>
@endsection
