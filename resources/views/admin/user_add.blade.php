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
                <label>Username</label>
                <input class="form-control" name="name" placeholder="Please Enter Username" value="{{ old('name') }}"/>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="Please Enter Email" value="{{ old('email') }}"/>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" placeholder="Please Enter Password" />
            </div>
            <div class="form-group">
                <label>RePassword</label>
                <input type="password" class="form-control" name="password_confirmation" placeholder="Please Enter RePassword" />
            </div>
            <div class="form-group">
                <label>User Level</label>
                <label class = "radio-inline">
                    <input name="role" value="{{ App\Models\User::ROLE_MEMBER }}" type="radio">Admin
                </label>
                <label class="radio-inline">
                    <input name="role" value="{{ App\Models\User::ROLE_ADMIN }}" checked = "" type="radio">Member
                </label>
            </div>
            <button type="submit" class="btn btn-default">User Add</button>
            <button type="reset" class="btn btn-default">Reset</button>
            </form>
    </div>
@endsection
