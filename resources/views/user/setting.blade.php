@extends('layout.layout-user')
@section('title')
    {{ trans('text.setting') }}
@endsection
@section('title-content')
    {{ trans('user/titles.setting') }}
@endsection
@section('content')
        <h1 style="text-align: center;margin: 20px;font-size: 20px;font-weight: bold; margin-bottom:70px;padding-top: 80px">{{ trans('user/titles.updateYourProfile') }}</h1>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                @if(isset($messages))
                    <div class="alert alert-danger">
                        {{ $messages }}
                    </div>
                @endif
                @if (isset($errors) && count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form name="form" id="form" class="form-horizontal" method="POST" action="">
                    {{ csrf_field() }}
                    <div class="change input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="name" type="text" class="form-control" name="name" value="{{ $user['name'] }}" >
                        <input id="hidden" type="hidden" class="form-control" name="userId" value="{{ $user['id'] }}" >
                    </div>
                    <div class="change input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input id="email" type="text" class="form-control" name="email" value="{{ $user['email'] }}" >
                    </div>
                    <div class="change input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="password" type="password" class="form-control" name="password" placeholder="{{ trans('text.password') }}">
                    </div>
                    <div class="change input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-log-in"></i></span>
                        <input id="password" type="password" class="form-control" name="password_confirmation" placeholder="{{ trans('text.retypePassword') }}">
                    </div>
                    <div class="form-group">
                        <!-- Button -->
                        <div class="col-xs-12 controls">
                            <button type="submit" href="#" class="btn btn-primary center-block"><i class="glyphicon glyphicon-home"></i>{{ trans('text.update') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection