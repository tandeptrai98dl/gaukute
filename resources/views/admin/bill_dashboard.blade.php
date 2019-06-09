@extends('admin')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Quản lý Đơn hàng
            </h1>
            <ol class="breadcrumb">
                <li><a href=""><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Đơn hàng</li>
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
                                    <th>Customer Name</th>
                                    <th>Order date</th>
                                    <th>Bill amount</th>
                                    <th>Payment method</th>
                                    <th>Notes</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($bills as $value)
                                        <tr>
                                            <td>{{$value->id }}</td>
                                            <td>{{$value->name}}</td>
                                            <td>{{$value->date_order}}</td>
                                            <td>{{number_format($value->total)}}₫</td>
                                            <td>{{$value->payment}}</td>
                                            <td>{{$value->note}}</td>
                                            @if($value->status == 0)
                                                <td>
                                                    <a href="{{action('BillController@edit',['id'=> $value->id])}}" class="btn btn-warning"><i class="fa fa-bolt" aria-hidden="true"> Confirm</i></a>
                                                </td>
                                            @else
                                                <td>
                                                    <a class="btn btn-success"><i class="fa fa-check" aria-hidden="true"> Done</i></a>
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
        </section>
        <!-- /.content -->
    </div>
@endsection