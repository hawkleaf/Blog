@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"> {{ $post->title }}</div>
                    <div class="panel-body">
                        {!! nl2br(e($post->body)) !!}
                    </div>
                    <div class="panel-footer">
                        {{ $post->published_at->diffForHumans() }}
                        @hasrole('Author')
                            @can('owner', $post)
                                <form method="POST" action="{{ route('post.destroy', $post->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button class="btn btn-default pull-right" type="submit">Delete</button>
                                    <div class="clearfix"></div>
                                </form>
                            @endcan
                        @endcan
                    </div>
                </div>
            </div>
        </div>
        @if (env('ENABLE_COMMENTS', true))
            <div class="column">
                @foreach ($post->comments as $comment)
                    <div class="col-md-6 col-md-offset-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">{{ $comment->user->name }}</div>
                            <div class="panel-body">{{ $comment->body }}</div>
                            <div class="panel-footer">
                                {{ $comment->created_at->diffForHumans() }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
