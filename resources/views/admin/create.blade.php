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
                <li class="active">New Product</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
            <div class="col-xs-12">
                <div class="box  box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tạo mới</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        {!! Form::open(['action' => ['AdminController@store'], 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal']) !!}
                        {!! Form::token() !!}
                        <div class="box-body">

                            <div class="form-group required">
                                {!! Form::label('name', 'Name', ['class' => 'col-sm-3 control-label']) !!}
                                <div class="col-sm-6">
                                    <input type="text" name="name" class="form-control" placeholder="" required>
                                </div>
                            </div>

                            <div class="form-group required">
                                {!! Form::label('type', 'Type', ['class' => 'col-sm-3 control-label']) !!}
                                <div class="col-sm-6">
                                    <select name="type_id" required>
                                        @foreach($type as $value)
                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group required">
                                {!! Form::label('price', 'Price', ['class' => 'col-sm-3 control-label']) !!}
                                <div class="col-sm-6">
                                    <input type="number" name="price" id="price" class="form-control" placeholder="" required>
                                </div>
                            </div>

                            <div class="form-group required">
                                {!! Form::label('promotion_price', 'Promotion Price', ['class' => 'col-sm-3 control-label']) !!}
                                <div class="col-sm-6">
                                    <input type="number" name="promotion_price" id="promotion_price" class="form-control" placeholder="" required>
                                </div>
                            </div>

                            <div class="form-group required">
                                {!! Form::label('image', 'Image', ['class' => 'col-sm-3 control-label']) !!}
                                <div class="col-sm-6">
                                    <input type="file" name="image" class="form-control" required>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <a href="{{action('AdminController@index')}}" class="btn btn-default">Cancel</a>
                                <button type="submit" id="test_btn" class="btn btn-info pull-right">Submit</button>
                            </div>
                            <!-- /.box-footer -->
                        </div>
                        {!! Form::close() !!}
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>

@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#price,#promotion_price').change(function(){
                var price           = parseInt($('#price').val());
                var promotion_price = parseInt($('#promotion_price').val());
                if (price < promotion_price && promotion_price != ''){
                    alert("Promotion price must be less than Price");
                    $('#test_btn').prop('disabled', true);
                }else $('#test_btn').prop('disabled', false);
            });
        });
    </script>
@endpush
