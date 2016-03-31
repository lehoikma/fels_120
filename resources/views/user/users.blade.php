@extends('layout.layout-user')
@section('title')
    {{ trans('text.allUser') }}
@endsection
@section('title-content')
    {{ trans('user/titles.allUser') }}
@endsection
@section('content')
    <div class="lesson col-md-12">
        <ul class="users" style="margin:20px;">
            @foreach($users as $user)
            <li>
                <img alt="{{ $user->name }}" class="gravatar" src="{{ asset('image/avatar.png') }}" style="height:80px;">
                <a href="{{ action('UserController@getFollow', $user->id) }}">{{ $user->name}}</a>
            </li>
            @endforeach
        </ul>
    </div>
@endsection
