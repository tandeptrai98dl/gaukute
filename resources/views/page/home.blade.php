@extends('master')
@section('content')

    <div class ="row">
        @if(Session::has('message'))
            <div id="myModal" class="modal show">
                <div class="modal-dialog modal-confirm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Awesome!</h4>
                        </div>
                        <div class="modal-body">
                            <p class="text-center">{{Session::get('message')}}</p>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success btn-block" id="hiden_modal">OK</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <div class="rev-slider">
        <div class="fullwidthbanner-container">
            <div class="fullwidthbanner">
                <div class="bannercontainer" >
                    <div class="banner" >
                        <ul>
                            @foreach($slide as $value)
                            <li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                                <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
                                    <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="upload/slide/{{$value->image}}" data-src="upload/slide/{{$value->image}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('upload/slide/{{$value->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="tp-bannertimer"></div>
            </div>
        </div>
    </div>

    <div class="container">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="beta-products-list">
                            <h4>Thú bông ngẫu nhiên</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm thấy {{count($new_product)}} sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>

                            <div class="row">
                                @foreach($new_product as $new)
                                    <div class="col-sm-3">
                                        <div class="single-item">
                                            @if($new->promotion_price != 0)
                                                <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                            @endif

                                            <div class="single-item-header">
                                                <a href="/product-detail/{{$new->id}}"><img src="upload/{{$new->type_id}}/{{$new->image}}" alt="" height="250px"></a>
                                            </div>
                                            <div class="single-item-body">
                                                <p class="single-item-title">{{$new->name}}</p>
                                                <p class="single-item-price">
                                                    @if($new->promotion_price == 0)
                                                        <span class="flash-sale">{{number_format($new->unit_price)}}₫</span>
                                                    @else
                                                        <span class="flash-del">{{number_format($new->unit_price)}}₫</span>
                                                        <span class="flash-sale">{{number_format($new->promotion_price)}}₫</span>
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="single-item-caption">
                                                <a class="add-to-cart pull-left" href="/add-to-cart/{{$new->id}}"><i class="fa fa-shopping-cart"></i></a>
                                                <a class="beta-btn primary" href="/product-detail/{{$new->id}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div> <!-- .beta-products-list -->

                        <div class="space50">&nbsp;</div>

                        <div class="beta-products-list">
                            <h4>Thú bông khuyến mãi</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm thấy {{count($promo_product)}} sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                                @foreach($promo_product as $product)
                                    <div class="col-sm-3">
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
                                                    <span class="flash-del">{{number_format($product->unit_price)}}₫</span>
                                                    <span class="flash-sale">{{number_format($product->promotion_price)}}₫</span>
                                                </p>
                                            </div>
                                            <div class="single-item-caption">
                                                <a class="add-to-cart pull-left" href="/add-to-cart/{{$product->id}}"><i class="fa fa-shopping-cart"></i></a>
                                                <a class="beta-btn primary" href="/product-detail/{{$product->id}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row">{{$promo_product->links()}}</div>
                        </div> <!-- .beta-products-list -->
                    </div>
                </div> <!-- end section with sidebar and main content -->

            </div> <!-- .main-content -->
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection