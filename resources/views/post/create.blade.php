@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Write Post</div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('post.store') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input class="form-control" type="text" name="title" placeholder="Title" Required></input>
                            </div>
                            <div class="form-group">
                                <label for="body">Body</label>
                                <textarea name="body" class="form-control" placeholder="Some interesting text" Required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Publish
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
