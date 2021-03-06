@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        @foreach($posts as $post)
            <div class="panel panel-default">

                <div class="panel-heading"><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></div>

                <div class="panel-body">
                    {!! nl2br(e($post->body)) !!}
                </div>

                <div class="panel-footer">{{ $post->published_at->diffForHumans() }} ({{ $post->published_at->toFormattedDateString() }})</div>

            </div>
        @endforeach
    </div>
@endsection
