@extends('admin')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Quản lý User
            </h1>
            <ol class="breadcrumb">
                <li><a href=""><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">User</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
            @if (Session::has('message'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    <p><i class="icon fa fa-check"></i>{{Session::get('message')}}</p>
                </div>
            @endif

            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-borderless" id="mail-table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $value)
                                    <tr>
                                        <td>{{$value->id }}</td>
                                        <td>{{$value->full_name}}</td>
                                        <td>{{$value->email}}</td>
                                        <td>{{$value->phone}}</td>
                                        @if($value->role == 1)
                                            <td>Admin</td>
                                            <td></td>
                                        @else
                                            <td>Customer</td>
                                            <td><a href="{{action('UserController@edit',['id'=> $value->id])}}" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-warning" aria-hidden="true"> Delete</i></a></td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection