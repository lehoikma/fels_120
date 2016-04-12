@extends('layout.layout-user')
@section('title')
    {{ trans('text.lessonResult') }}
@endsection
@section('title-content')
    {{ trans('text.lessonResult') }}
@endsection
@section('content')
    <div class="category col-md-12">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="panel panel-default">
                <div class="dataTable_wrapper">
                    <table class="table table-striped  table-hover">
                        <thead>
                        <tr>
                            <th>{{ trans('text.word') }}</th>
                            <th>{{ trans('text.wordAnswer') }}</th>
                            <th>{{ trans('text.wordCorrect') }}</th>
                            <th>{{ trans('text.wordResult') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($lessonWords as $lessonWord)
                            <tr class="odd gradeX  danger success">
                                <td class="center"> {{ $lessonWord['word']->content }} </td>
                                <td class="center"> {{ $lessonWord['wordAnswer']['content'] }} </td>
                                <td class="center"> @foreach ($lessonWord->word->wordAnswers as $wordAnswer) @if ($wordAnswer['status']){{ $wordAnswer['content'] }} @endif @endforeach</td>
                                @if ($lessonWord['wordAnswer']['status'])
                                    <td class="center">
                                        <a href="#" class="btn btn-danger btn-xs " >{{ trans('text.true') }}</a>
                                    </td>
                                @else
                                    <td class="center">
                                        <a href="#" class="btn btn-danger btn-xs" >{{ trans('text.false') }}</a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
