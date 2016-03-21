@extends('layout.layout-login-regiter')
@section('title',trans('user/titles.register'))
@section('content')
    <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
        <div class="row">
            <div class="iconmelon">
                <img src="{{asset('image/1.png')}}">
            </div>
        </div>

        <div class="panel panel-default" >
            <div class="panel-heading">
                <div class="panel-title text-center">{{trans('user/titles.register')}}</div>
            </div>
            <div class="panel-body" >
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
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-log-in"></i></span>
                        <input id="password" type="password" class="form-control" name="password_confirmation" placeholder="Retype password">
                    </div>

                    <div class="form-group">
                        <!-- Button -->
                        <div class="col-xs-12 controls">
                            <button type="submit" href="#" class="btn btn-primary center-block"><i class="glyphicon glyphicon-home"></i> Register</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

