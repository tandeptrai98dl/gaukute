@extends('admin')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Quản lý Sản phẩm
            </h1>
            <ol class="breadcrumb">
                <li><a href=""><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Product</li>
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
                    <div class="box-header">
                        <a href="{{action('AdminController@create')}}" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"> Create</i></a>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-borderless" id="mail-table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Type</th>
                                    <th>Price</th>
                                    <th>Promotion Price</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $value)
                                        <tr>
                                            <td>{{$value->id }}</td>
                                            <td>{{$value->name}}</td>
                                            <td><img src="upload/{{$value->type_id}}/{{$value->image}}" alt="" height="100px"></td>
                                            <td>{{$value->description}}</td>
                                            <td>{{$value->unit_price}}</td>
                                            <td>{{$value->promotion_price}}</td>
                                            <td>
                                                <a href="{{action('AdminController@show',['id'=> $value->id])}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"> Edit</i></a>
                                                <a href="{{action('AdminController@destroy',['id'=> $value->id])}}" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o" aria-hidden="true"> Delete</i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper">
                                <div class="row pull-right">
                                    {{ $products->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection