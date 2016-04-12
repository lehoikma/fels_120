@extends('layout.layout-user')
@section('title')
    {{ trans('word/titles.wordlist') }}
@endsection
@section('title-content')
    {{ trans('word/titles.wordlist') }}
@endsection
@section('content')
    <div class="word-list col-md-offset-3">
        <div class="filter col-md-12">
            <div class="col-md-12">
                <form action="#" method="post">
                    <div class="filter-category col-md-3">
                        <div class="form-group" style="padding-right:20px;">
                            <label for="sel1" style="margin-bottom:10px;">{{ trans('labels.selectListCategory') }}</label>
                            <select class="form-control" id="sel1">
                                <option>1</option>
                            </select>
                        </div>
                    </div>
                    <div class="filter-search col-md-3">
                        <input type="radio" name="gender" value="male" checked>{{ trans('labels.learned') }}<br>
                        <input type="radio" name="gender" value="female">{{ trans('labels.notLearned') }}<br>
                        <input type="radio" name="gender" value="other">{{ trans('labels.all') }}
                    </div>
                    <div class="button col-md-1">
                        <button type="button" class="btn btn-primary">{{ trans('text.filter') }}</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="word-content col-md-12">
        </div>
    </div>
@endsection
