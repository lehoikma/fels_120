@extends('layout.layout-admin')
@section('title', trans('user/titles.listUser'))
@section('content')
    <div class="col-lg-12">
        <h1 class="page-header">
            {{ trans('user/titles.listUser') }}
        </h1>
    </div>
    <!-- /.col-lg-12 -->
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
        <tr align="center">
            <th> {{ trans('labels.name') }}</th>
            <th>{{ trans('labels.email') }}</th>
            <th>{{ trans('labels.level') }}</th>
            <th>{{ trans('text.edit') }}</th>
            <th>{{ trans('text.delete') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($getListUser as $value)
        <tr class="odd gradeX" align="center">
            <td>{{ $value['name'] }}</td>
            <td>{{ $value['email'] }}</td>
            <td>
                @if ($value['role'] == 1)
                    {{ trans('text.admin') }}
                @else
                    {{ trans('text.member') }}
                @endif
            </td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ action('AdminController@getEditUser', $value['id']) }}">{{ trans('text.edit') }}</a></td>
            <td class="center"><i class="btn-delete fa fa-trash-o  fa-fw"></i><a href="{{ action('AdminController@getDeleteUser', $value['id']) }}"> {{ trans('text.delete') }}</a></td>
        </tr>
            @endforeach
        </tbody>
    </table>
@endsection
