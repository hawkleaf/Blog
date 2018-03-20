@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit postt</div>
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    <div class="panel-body">
                        <form action="{{ route('post.update', $post->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input class="form-control" type="text" name="title" placeholder="Title" value="{{ $post->title }}" Required></input>
                            </div>
                            <div class="form-group">
                                <label for="body">Body</label>
                                <textarea name="body" class="form-control" placeholder="Some interesting text" Required>{{ $post->body }}</textarea>
                            </div>
                            <div class="input-group">
                                <input type="hidden" name="published" value="false">
                                @if($post->published)
                                     <input type="checkbox" name="published" value="true" checked> Publish
                                @else
                                    <input type="checkbox" name="published" value="true"> Publish
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Save changes
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
