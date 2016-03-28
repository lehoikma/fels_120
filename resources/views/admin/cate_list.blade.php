@extends('layout.layout-admin')
@section('title', trans('category/titles.listCategory'))
@section('content')
    <div class="col-lg-12">
        <h1 class="page-header">
            {{ trans('category/titles.listCategory') }}
        </h1>
    </div>
    <!-- /.col-lg-12 -->
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
        <tr align="center">
            <th>{{ trans('labels.name') }}</th>
            <th>{{ trans('labels.description') }}</th>
            <th>{{ trans('text.edit') }}</th>
            <th>{{ trans('text.delete') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($categoryList as $value)
            <tr class="odd gradeX" align="center">
                <td> {{ $value['name'] }} </td>
                <td> {{ $value['description'] }} </td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i><a href="{{ action('CategoryController@getEdit', $value['id']) }}">{{ trans('text.edit') }}</a></td>
                <td class="center"><i class="btn-delete fa fa-trash-o  fa-fw"></i><a href="{{ action('CategoryController@getDelete', $value['id']) }}"> {{ trans('text.delete') }}</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
