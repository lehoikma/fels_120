@extends('layout.layout-admin' )
@section('title', trans('word/titles.editWord'))
@section('content')
    <div class="col-lg-12">
        <h1 class="page-header">
            {{ trans('word/titles.editWord') }}
        </h1>
    </div>
    <div class="col-lg-10" style="padding-bottom:120px">
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
                <label>{{ trans('labels.category') }}</label>
                    <select class="form-control" id="category" name="category">
                        @foreach ($categoryAll as $key)
                            <option value = "{{ $key->id }}" @if ($key->id == $word['category']->id) selected @endif >{{ $key->name }}</option>
                        @endforeach
                    </select>
            </div>
            <div class = "form-group">
                <label>{{ trans('text.content') }}</label>
                <textarea class="form-control" rows="4" name="content">{{ $word['content'] }}</textarea>
            </div>
            <input type="hidden" name="id_word" value="{{ $word['id'] }}">
            <button type="submit" class=" col-md-2 btn btn-default">{{ trans('word/titles.editWord') }}</button>
        </form>
    </div>
@endsection
