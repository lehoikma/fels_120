<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{ trans('text.eLeaning') }} - @yield('title')</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('admin/bower_components/metisMenu/dist/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('admin/dist/css/sb-admin-2.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!-- Custom Fonts -->
    <link href="{{ asset('admin/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('css/custom-style.css') }}" rel="stylesheet">
</head>

<body>
<div id="wrapper">
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">{{ trans('text.toggleNavigation') }}</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="http://recruit.framgia.vn/assets/logo_framgia-8942793d84ada6ba4765a643ded3f89d.png" style="height: 34px;margin-left:80px;padding-bottom:7px;"></a>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href=""><i class="fa fa-user fa-fw"></i>{{ trans('text.userProfile') }}</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i>{{ trans('text.settings') }}</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="{{ action('AdminController@getLogout') }}"><i class="fa fa-sign-out fa-fw"></i>{{ trans('text.logout') }}</a>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="menu" style="float:right;">
            <li><a href="{{ action('UserController@getIndex') }}">{{ trans('text.home') }}</a></li>
            <li><a href="{{ action('UserCategoryController@getList') }}">{{ trans('labels.category') }}</a></li>
            <li><a href="#">{{ trans('text.wordList') }}</a></li>
            <li><a href="#">{{ trans('text.contact') }}</a></li>
        </ul>
    </nav>
    <div id="grapper">
        <div class="container">
            <div class="color col-md-12" style="height:20px;height: 37px;background: #848088;margin-top:7px;">
                <p class="title-cate">@yield('title-content')</p>
            </div>
            @yield('content')
        </div>
    </div>
</div>

</div>
<!-- jQuery -->
<script src="{{ asset('admin/bower_components/jquery/dist/jquery.min.js') }}"></script>

<script src="{{ asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('admin/bower_components/metisMenu/dist/metisMenu.min.js') }}"></script>

<script src="{{ asset('admin/dist/js/sb-admin-2.js') }}"></script>


</body>

</html>
