@extends('layout.layout-admin' )
@section('title', trans('category/titles.editCate'))
@section('content')
    <div class="col-lg-12">
        <h1 class="page-header">
            {{ trans('category/titles.editCate') }}
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
        <form action="" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Category Name</label>
                <input class="form-control" name="name" value="{{ $cateIdList['name'] }}" placeholder="Please Enter Name Category" />
            </div>
            <div class="form-group">
                <label>Category Description</label>
                <textarea class="form-control" rows="4" name="description"> {{ $cateIdList['description'] }}</textarea>
            </div>
            <div class="form-group">
                <label>Number of word in lesson</label>
                <input class="form-control" name="number" value="{{ $cateIdList['number_of_word_lesson'] }}"/>
            </div>
            <div class="form-group">
                <label>Image</label>
                <img src="{{ asset("/uploads/category/{$cateIdList['image']}") }}" width="200" height="200">
            </div>
            <button type="submit" class="btn btn-default">Category Edit</button>
        </form>
    </div>
@endsection
