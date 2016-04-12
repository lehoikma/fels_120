@extends('layout.layout-user')
@section('title')
    {{ trans('text.lesson') }}
@endsection
@section('title-content')
    {{ trans('text.lesson') }}
@endsection
@section('content')
    <div class="category col-md-12">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $category['name'] }}
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1">
                            <form method="POST" action="">
                                {{ csrf_field() }}
                                <fieldset>
                                    <div class="col-md-6 col-md-offset-3">
                                        @foreach ($lessonWords as $lessonWord)
                                            <li>
                                            <h4>{{ $lessonWord->word->content }}</h4>
                                                @foreach($lessonWord->word->wordAnswers as $wordAnswer)
                                                    <div class="row">
                                                        <div class="col-md-1">
                                                            <input type="radio" value="{{ $wordAnswer->id }}" name="result[{{ $lessonWord->id }}]">
                                                        </div>
                                                        <div class="col-md-2">
                                                            {{ $wordAnswer->content }}
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </li>
                                        @endforeach
                                    </div>
                                    <input id="hidden" type="hidden" class="form-control" name="lesson" value="{{ $lessonCreate->id }}" >
                                    <input class="btn btn-primary" type="submit" value="{{ trans('text.finish') }}">
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
