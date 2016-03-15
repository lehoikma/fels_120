@extends('layout.layout-admin')
@section('title', trans('user/titles.listUser'));
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
            <th>Username</th>
            <th>Email</th>
            <th>Level</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($getListUser as $value)
        <tr class="odd gradeX" align="center">
            <td>{{ $value['name'] }}</td>
            <td>{{ $value['email'] }}</td>
            <td>
                @if ($value['role'] == 1)
                    {{ 'Admin' }}
                @else
                    {{ 'Member' }}
                @endif
            </td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ URL::Route('edit-user', $value['id']) }}">Edit</a></td>
            <td class="center"><i class="btn-delete fa fa-trash-o  fa-fw"></i><a href="{{ URL::Route('delete-user', $value['id']) }}"> Delete</a></td>
        </tr>
            @endforeach
        </tbody>
    </table>
@endsection
