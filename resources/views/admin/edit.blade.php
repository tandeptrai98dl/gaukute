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
                        <h3 class="box-title">Cập nhật</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        {!! Form::open(['action' => ['AdminController@update',$detail->id], 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal']) !!}
                        {!! Form::token() !!}
                        <div class="box-body">

                            <div class="form-group required">
                                {!! Form::label('name', 'Name', ['class' => 'col-sm-3 control-label']) !!}
                                <div class="col-sm-6">
                                    <input type="text" name="name" class="form-control" value="{{$detail->name}}" required>
                                </div>
                            </div>

                            <div class="form-group required">
                                {!! Form::label('type', 'Type', ['class' => 'col-sm-3 control-label']) !!}
                                <div class="col-sm-6">
                                    <select name="type_id" required>
                                        @foreach($type as $value)
                                            <option @if($value->id == $detail->type_id){{'selected'}} @endif value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group required">
                                {!! Form::label('price', 'Price', ['class' => 'col-sm-3 control-label']) !!}
                                <div class="col-sm-6">
                                    <input type="number" name="unit_price" id="unit_price" class="form-control" value="{{$detail->unit_price}}" required>
                                </div>
                            </div>

                            <div class="form-group required">
                                {!! Form::label('promotion_price', 'Promotion Price', ['class' => 'col-sm-3 control-label']) !!}
                                <div class="col-sm-6">
                                    <input type="number" name="promotion_price" id="promotion_price" class="form-control" value="{{$detail->promotion_price}}" required>
                                </div>
                            </div>

                            <div class="form-group required">
                                {!! Form::label('description', 'Description', ['class' => 'col-sm-3 control-label']) !!}
                                <div class="col-sm-6">
                                    <input type="text" name="description" id="description" class="form-control" value="{{$detail->description}}" required>
                                </div>
                            </div>

                            <div class="form-group required">
                                {!! Form::label('image', 'Image', ['class' => 'col-sm-3 control-label']) !!}
                                <div class="col-sm-3">
                                    <img src="/upload/{{$detail->type_id}}/{{$detail->image}}" alt="Image" height="200px">
                                </div>

                                <div class="col-sm-3">
                                    <input type="file" name="image" class="form-control">
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
            $('#unit_price,#promotion_price').change(function(){
                var price           = parseInt($('#unit_price').val());
                var promotion_price = parseInt($('#promotion_price').val());
                if (price < promotion_price && promotion_price != ''){
                    alert("Promotion price must be less than Price");
                    $('#test_btn').prop('disabled', true);
                }else $('#test_btn').prop('disabled', false);
            });
        });
    </script>
@endpush
