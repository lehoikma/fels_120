@extends('layout.layout-admin')
@section('title', trans('user/titles.editUser'))
@section('content')
    <div class="col-lg-12">
        <h1 class="page-header">
            {{ trans('user/titles.editUser') }}
        </h1>
    </div>
    <!-- /.col-lg-12 -->
    <div class="col-lg-7" style="padding-bottom:120px">
        @if (isset($messages) )
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
        <form action="" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" value="{{ $editUserId['email'] }}" disabled />
            </div>
            <div class="form-group">
                <label>{{ trans('labels.name') }}</label>
                <input type="text" class="form-control" value="{{ $editUserId['name'] }}" name="name" />
            </div>
            <div class="form-group">
                <label>{{ trans('labels.password') }}</label>
                <input type="password" class="form-control" name="password" placeholder="{{ trans('labels.pleaseEnterPassword') }}" value="{{ $editUserId['password'] }}"/>
            </div>
            <div class="form-group">
                <label>{{ trans('labels.userLevel') }}</label>
                <label class="radio-inline">
                    <input name="rdoLevel" value="1" type="radio">{{ trans('text.admin') }}
                </label>
                <label class="radio-inline">
                    <input name="rdoLevel" value="2" checked="" type="radio">{{ trans('text.member') }}
                </label>
            </div>
            <button type="submit" class="btn btn-default">{{ trans('user/titles.editUser') }}</button>
            </form>
    </div>
@endsection
