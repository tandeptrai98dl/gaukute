@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="/">Trang chủ</a> / <span>Chi tiết sản phẩm</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content">
        <div class="row">
            <div class="col-sm-9">

                <div class="row">
                    <div class="col-sm-4">
                        <img src="upload/{{$detail->type_id}}/{{$detail->image}}" alt="" height="250px">
                    </div>
                    <div class="col-sm-8">
                        <div class="single-item-body">
                            <p class="single-item-title"><h3>{{$detail->name}}</h3></p><br>
                            <p class="single-item-price">
                                @if($detail->promotion_price == 0)
                                    <span class="flash-sale">{{number_format($detail->unit_price)}}₫</span>
                                @else
                                    <span class="flash-del">{{number_format($detail->unit_price)}}₫</span>
                                    <span class="flash-sale">{{number_format($detail->promotion_price)}}₫</span>
                                @endif
                            </p>
                        </div>

                        <div class="clearfix"></div>
                        <div class="space20">&nbsp;</div>

                        <div class="single-item-desc">
                            <p>{{$detail->description}}</p>
                        </div>
                        <div class="space20">&nbsp;</div>

                        <p>Số lượng:</p>
                        <div class="single-item-options">
                            <select class="wc-select" name="color">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <a class="add-to-cart" href="/add-to-cart/{{$detail->id}}"><i class="fa fa-shopping-cart"></i></a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="space40">&nbsp;</div>
                <div class="woocommerce-tabs">
                    <ul class="tabs">
                        <li><a href="#tab-description">Mô tả</a></li>
                    </ul>

                    <div class="panel" id="tab-description">
                        <p>{{$detail->description}}</p>
                    </div>
                </div>
                <div class="space50">&nbsp;</div>
                <div class="beta-products-list">
                    <h4>Sản phẩm tương tự</h4>

                    <div class="row">
                        @foreach($similar as $product)
                            <div class="col-sm-4">
                                <div class="single-item">
                                    @if($product->promotion_price != 0)
                                        <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                    @endif

                                    <div class="single-item-header">
                                        <a href="/product-detail/{{$product->id}}"><img src="upload/{{$product->type_id}}/{{$product->image}}" alt="" height="250px"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$product->name}}</p>
                                        <p class="single-item-price">
                                            @if($product->promotion_price == 0)
                                                <span class="flash-sale">{{number_format($product->unit_price)}}₫</span>
                                            @else
                                                <span class="flash-del">{{number_format($product->unit_price)}}₫</span>
                                                <span class="flash-sale">{{number_format($product->promotion_price)}}₫</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="#"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="#">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div> <!-- .beta-products-list -->
            </div>
            <div class="col-sm-3 aside">
                <div class="widget">
                    <h3 class="widget-title">Best Sellers</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            @foreach($similar as $product)
                                <div class="media beta-sales-item">
                                    <a class="pull-left" href="/product-detail/{{$product->id}}"><img src="upload/{{$product->type_id}}/{{$product->image}}" alt=""></a>
                                    <div class="media-body">
                                        {{$product->name}}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div> <!-- best sellers widget -->
            </div>
        </div>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection