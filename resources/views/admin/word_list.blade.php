@extends('layout.layout-admin')
@section('title', trans('word/titles.listWord'))
@section('content')
    <div class="col-lg-12">
        <h1 class="page-header">
            {{ trans('word/titles.listWord') }}
        </h1>
    </div>
    <!-- /.col-lg-12 -->
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
        <tr align="center">
            <th>{{ trans('text.word') }}</th>
            <th>{{ trans('labels.category') }}</th>
            <th>{{ trans('text.edit') }}</th>
            <th>{{ trans('text.delete') }}</th>
        </tr>
        </thead>
        @foreach($wordAll as $value)
        <tbody>
            <tr class="odd gradeX" align="center">
                <td>{{ $value['content'] }}</td>
                <td>{{ $value['category']->name }} </td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ action('WordController@getEdit', $value['id']) }}">{{ trans('text.edit') }}</a></td>
                <td class="center"><i class="btn-delete fa fa-trash-o  fa-fw"></i><a href="{{ action('WordController@getDelete', $value['id']) }}"> {{ trans('text.delete') }} </a></td>
            </tr>
        </tbody>
        @endforeach
    </table>
@endsection
