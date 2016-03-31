@extends('layout.layout-user')
@section('title')
    {{ trans('user/titles.follow') }}
@endsection
@section('title-content')
    {{ trans('user/titles.follow') }}
@endsection
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="{{ asset('js/follow.js') }}"></script>
@section('content')
    <div class="follow col-md-12">
        <div class="col-md-4">
            <div class="user_info">
                <h1>
                    <img alt="demo23" class="gravatar" src="{{ asset('image/avatar.png') }}" style="height: 100px;">
                    <span style="font-size: 20px;font-weight: bold;"> {{ $user['name'] }}</span>
                </h1>
            </div>
            <div class="stast col-md-12">
                <div class="stast1 col-md-6">
                    <div class="following">
                        {{ $followCount['following_count'] }}
                    </div>
                    <div class="number">{{ trans('text.following') }}</div>
                </div>
                <div class="stast2">
                    <div class="followers">
                        {{ $followCount['follower_count'] }}
                    </div>
                    <div class="number">{{ trans('text.follower') }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div id="follow_form">
                <button class="btn btn-lg btn-danger button unfollow  @if (!$isFollowing) hide @endif" id="unfollow" data-csrf="{{ csrf_token() }}" data-action="{{ action('UserController@postUnfollow') }}" data-btn-id ="unfollow" data-following-id="{{ $user['id'] }}" data-follower-id="{{ Auth::User()->id }}" onClick="follow_or_unfollow('#unfollow')">{{ trans('text.unfollow') }}</button>
                <button class="btn btn-lg btn-danger button follow  @if ($isFollowing) hide @endif" id="follow" data-csrf="{{ csrf_token() }}" data-action="{{ action('UserController@postFollow') }}" data-btn-id="follow" data-following-id="{{ $user['id'] }}" data-follower-id="{{ Auth::User()->id }}" onClick="follow_or_unfollow('#follow')" >{{ trans('text.follow') }}</button>
            </div>
        </div>
    </div>
@endsection
