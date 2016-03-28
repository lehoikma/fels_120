@extends('layout.layout-admin' )
@section('title', trans('user/titles.addUser'))
@section('content')
    <div class="col-lg-12">
        <h1 class="page-header">
            {{ trans('user/titles.addUser') }}
        </h1>
    </div>
    <!-- /.col-lg-12 -->
    <div class="col-lg-7" style="padding-bottom:120px">
        @if (isset($messages))
            <div class="alert alert-danger">
                {{ $messages }}
            </div>
        @endif
        @if (isset ($errors) && count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="" method="POST">
            {{ csrf_field() }}
            <div class = "form-group">
                <label>{{ trans('user/titles.username') }}</label>
                <input class="form-control" name="name" placeholder="{{ trans('user/titles.pleaseEnterUsername') }}" value="{{ old('name') }}"/>
            </div>
            <div class="form-group">
                <label>{{ trans('user/titles.email') }}</label>
                <input type="email" class="form-control" name="email" placeholder="{{ trans('user/titles.pleaseEnterEmail') }}" value="{{ old('email') }}"/>
            </div>
            <div class="form-group">
                <label>{{ trans('user/titles.password') }}</label>
                <input type="password" class="form-control" name="password" placeholder="{{ trans('user/titles.pleaseEnterPassword') }}" />
            </div>
            <div class="form-group">
                <label>{{ trans('user/titles.rePassword') }}</label>
                <input type="password" class="form-control" name="password_confirmation" placeholder="{{ trans('user/titles.pleaseEnterRePassword') }}" />
            </div>
            <div class="form-group">
                <label>{{ trans('user/titles.userLevel') }}</label>
                <label class = "radio-inline">
                    <input name="role" value="{{ App\Models\User::ROLE_MEMBER }}" type="radio">{{ trans('text.admin') }}
                </label>
                <label class="radio-inline">
                    <input name="role" value="{{ App\Models\User::ROLE_ADMIN }}" checked = "" type="radio">{{ trans('text.member') }}
                </label>
            </div>
            <button type="submit" class="btn btn-default">{{ trans('user/titles.addUser') }}</button>
            <button type="reset" class="btn btn-default">{{ trans('user/titles.reset') }}</button>
            </form>
    </div>
@endsection
