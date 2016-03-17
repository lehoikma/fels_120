@extends('layout.layout-admin')
@section('title', trans('category/titles.listCate'))
@section('content')
    <div class="col-lg-12">
        <h1 class="page-header">
            {{ trans('category/titles.listCate') }}
        </h1>
    </div>
    <!-- /.col-lg-12 -->
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
        <tr align="center">
            <th>Name</th>
            <th>Description</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($categoryList as $value)
            <tr class="odd gradeX" align="center">
                <td> {{ $value['name'] }} </td>
                <td> {{ $value['description'] }} </td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i><a href="{{ action('CategoryController@getEdit', $value['id']) }}">Edit</a></td>
                <td class="center"><i class="btn-delete fa fa-trash-o  fa-fw"></i><a href="{{ action('CategoryController@getDelete', $value['id']) }}"> Delete</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
