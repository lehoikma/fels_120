@extends('layout.layout-user')
@section('title')
    {{ trans('text.home') }}
@endsection
@section('title-content')
    {{ trans('text.home') }}
@endsection
@section('content')
    <div class="content-home col-md-12">
        <img src="{{ asset('image/muctieu.jpg') }}">
    </div>
@endsection