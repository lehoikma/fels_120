@extends('layout.layout-user')
@section('title')
    {{ trans('text.home') }}
@endsection
@section('title-content')
    {{ trans('text.home') }}
@endsection
@section('content')
    <div class="content-home col-md-12">
       <div class="col-md-3">
           <div class="sidebar-nav navbar-collapse">
               <section class="user_info">
                   <a href="#">
                       <img src="{{ asset('image/avatar.png') }}" style="height:80px; width:80px;" class="gravatar">
                   </a>
                   <h3>{{ Auth::user()->name }}</h3>
               </section>
               <section class="stats">
                   <div class="stats">
                       <a href="#" class="btn btn-success btn-xs">
                           <strong id="following" class="stat">0</strong>
                           {{ trans('text.following') }}
                       </a>
                       <a href="#" class="btn btn-primary btn-xs">
                           <strong id="followers" class="stat">0</strong>
                           {{ trans('text.follower') }}
                       </a>
                   </div>
               </section>
           </div>
       </div>
        <div class="col-md-9">
            <div class="button-home col-md-12">
                <a href="{{ action('UserWordController@getList') }}" class="col-md-2 btn-home">{{ trans('text.word') }}</a>
                <a href="{{ action('UserCategoryController@getList') }}" class="col-md-2 btn-home">{{ trans('text.lesson') }}</a>
            </div>
            <div class="col-md-12">
                <div id="wrapper-home">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header title-home">{{ trans('text.activity') }}</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <li style="list-style: none;">
                                <img src="{{ asset('image/avatar.png') }}" style="height:80px; width:80px;" class="gravatar">
                                <h3>{{ Auth::user()->name }}</h3>
                            </li>
                        </div>
                        <div class="col-md-7">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <h1 class="page-header"></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
