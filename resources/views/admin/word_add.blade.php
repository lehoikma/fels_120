@extends('layout.layout-admin' )
@section('title', trans('word/titles.addWord'))
@section('content')
    <div class="col-lg-12">
        <h1 class="page-header">
            {{ trans('word/titles.addWord') }}
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
                <select class="form-control" id="category_id" name="category">
                    <option value="0">{{ trans('labels.chooseCategoryType') }}</option>
                    @foreach($categoryList as $value)
                        <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class = "form-group">
                <label>{{ trans('labels.content') }}</label>
                <textarea class="form-control" rows="4" name="content"> {{ old('content') }} </textarea>
            </div>
            <div class = "answer-field-box form-group row col-md-12">
                <label class="row col-md-12">{{ trans('labels.option') }}</label>
                @for ($i = 1; $i <= 4; $i++)
                <div class="option col-md-12">
                    <div class="col-md-7">
                        <input class = "row form-control" name = "content_option[{{ $i }}]" />
                    </div>
                    <div class="col-md-3 checkbox">
                        <label><input type="radio" name="correct[]" value="{{ $i }}"><b>{{ trans('labels.correctOption') }}</b></label>
                    </div>
                </div>
                @endfor
            </div>
            <button type="submit" class=" col-md-2 btn btn-default">{{ trans('word/titles.addWord') }}</button>
        </form>
    </div>
@endsection
