@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">{{ $user->name }}</h3>
              </div>
              <div class="panel-body">
                Panel content
              </div>
            </div>
        </div>
    </div>
@endsection
