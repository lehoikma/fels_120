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
                <form action="" method="post">
                    {{ csrf_field() }}
                    <div class="filter-category col-md-3">
                        <div class="form-group" style="padding-right:20px;">
                            <label for="sel1" style="margin-bottom:10px;">{{ trans('labels.selectListCategory') }}</label>
                            <select class="form-control" name="categoryId" id="categoryId">
                                <option value="0">{{ trans('labels.chooseCategoryType') }}</option>
                                @foreach ($category as $category)
                                    <option value="{{ $category->id }}" @if (!empty($dataFilter) && $dataFilter['categoryId'] == $category->id) selected="selected" @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="filter-search col-md-3">
                        <input type="radio" name="conditional" value="{{ trans('text.conditionalAll') }}" @if (!empty($dataFilter) && $dataFilter['conditional'] == trans('text.conditionalAll')) checked @endif>{{ trans('labels.learned') }}<br>
                        <input type="radio" name="conditional" value="{{ trans('text.conditionalNotLearned') }}" @if (!empty($dataFilter) && $dataFilter['conditional'] == trans('text.conditionalNotLearned')) checked @endif>{{ trans('labels.notLearned') }}<br>
                        <input type="radio" name="conditional" value="{{ trans('text.conditionalLearned') }}" @if (!empty($dataFilter) && $dataFilter['conditional'] == trans('text.conditionalLearned')) checked @endif >{{ trans('labels.all') }}
                    </div>
                    <div class="button col-md-1">
                        <input type="submit" class="btn btn-primary" value="{{ trans('text.filter') }}">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="word-content col-md-12">
        <div class="panel panel-default">
            <div class="dataTable_wrapper">
                <table class="table table-striped  table-hover">
                    <thead>
                        <tr>
                            <th>{{ trans('text.category') }}</th>
                            <th>{{ trans('text.content') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if (isset($words))
                        @foreach ($words as $word)
                            <tr class="odd gradeX">
                                <td class="center">{{ $word['category']->name }}</td>
                                <td class="center">{{ $word['content'] }}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                    </table>
                </div>
            </div>
    </div>
@endsection

