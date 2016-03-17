@extends('layout.layout-admin' )
@section('title', trans('category/titles.addCate'))
@section('content')
    <div class="col-lg-12">
        <h1 class="page-header">
            {{ trans('category/titles.addCate') }}
        </h1>
    </div>
    <!-- /.col-lg-12 -->
    <div class="col-lg-7" style="padding-bottom:120px">
        @if (isset($messages))
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
        <form action="" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class = "form-group">
                <label>Category Name</label>
                <input class="form-control" name="name" placeholder="Please Enter Name Category" value = "{{ old('name') }}"/>
            </div>
            <div class = "form-group">
                <label>Category Description</label>
                <textarea class="form-control" rows="4" name="description"> {{ old('description') }} </textarea>
            </div>
            <div class = "form-group">
                <label>Number of word in lesson</label>
                <input class = "form-control" name = "number" value = "{{ old('number') }}" />
            </div>
            <div class="form-group">
                <label>Images</label>
                <input type="file" name="images">
            </div>
            <button type="submit" class="btn btn-default">Category Add</button>
        </form>
    </div>
@endsection
