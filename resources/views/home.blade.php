@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        @foreach($posts as $post)
            <div class="panel panel-default">

                <div class="panel-heading">{{ $post->title }}</div>

                <div class="panel-body">
                    {{  $post->body }}
                </div>

                <div class="panel-footer">{{ $post->published_at->diffForHumans() }}</div>

            </div>
        @endforeach
    </div>
@endsection
