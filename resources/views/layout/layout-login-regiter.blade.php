<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Train Laravel">
    <meta name="author" content="Le Van Hoi">
    <title>@yield('title')</title>
    <!-- Login Core CSS -->
    <link href="{{ asset('css/style-user.css') }}" rel="stylesheet" type="text/css" />
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
    @yield('content')
</div>
</body>
