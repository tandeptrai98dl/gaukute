<div id="header">
    <div class="header-top">
        <div class="container">
            <div class="pull-left auto-width-left">
                <ul class="top-menu menu-beta l-inline">
                    <li><a href="/contact"><i class="fa fa-home"></i> Đại học Công nghệ Thông tin</a></li>
                    <li><a href="/about"><i class="fa fa-phone"></i> Team Solo MID</a></li>
                </ul>
            </div>
            <div class="pull-right auto-width-right">
                <ul class="top-details menu-beta l-inline">
                @if(Auth::check())
                    <li><a href="#">{{Auth::user()->full_name}}</a></li>
                    <li><a href="/logout">Đăng xuất</a></li>
                @else
                    <li><a href="/signup">Đăng kí</a></li>
                    <li><a href="/login">Đăng nhập</a></li>
                @endif
                </ul>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-top -->
    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-left">
                <a href="/" id="logo"><img src="upload/icon/logo.png" width="80px" alt=""></a>
            </div>
            <div class="pull-right beta-components space-left ov">
                <div class="space10">&nbsp;</div>
                <div class="beta-comp">
                    <form role="search" method="get" id="searchform" action="{{route('search')}}">
                        <input type="text" value="" name="key" id="s" placeholder="Nhập từ khóa..." />
                        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                    </form>
                </div>

                @if(Session::has('cart'))
                    <div class="beta-comp">
                        <div class="cart">
                            <div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng ({{Session('cart')->total_qty}}) <i class="fa fa-chevron-down"></i></div>
                            <div class="beta-dropdown cart-body">
                                @foreach($product_cart as $product)
                                    <div class="cart-item">
                                        <a class="cart-item-delete" href="/delete-cart/{{$product['item']['id']}}"><i class="fa fa-times"></i></a>
                                        <div class="media">
                                            <a class="pull-left" href="#"><img src="upload/{{$product['item']['type_id']}}/{{$product['item']['image']}}" alt=""></a>
                                            <div class="media-body">
                                                <span class="cart-item-title">{{$product['item']['name']}}</span>
                                                <span class="cart-item-amount">{{$product['qty']}} x <span>
                                                @if($product['item']['promotion_price'] != 0)
                                                    {{number_format($product['item']['promotion_price'])}}₫
                                                @else
                                                    {{number_format($product['item']['unit_price'])}}₫
                                                @endif </span></span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="cart-caption">
                                    <div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{number_format(Session('cart')->total_price)}}₫</span></div>
                                    <div class="clearfix"></div>

                                    <div class="center">
                                        <div class="space10">&nbsp;</div>
                                        <a href="/checkout" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- .cart -->
                    </div>
                @endif
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->

    </div> <!-- .header-body -->
    <div class="header-bottom" style="background-color: #0277b8;">
        <div class="container">
            <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
            <div class="visible-xs clearfix"></div>
            <nav class="main-menu">
                <ul class="l-inline ov">
                    <li><a href="/">Trang chủ</a></li>
                    <li><a href="#">GẤU TEDDY</a>
                        <ul class="sub-menu">
                            @foreach($data['teddy'] as $value)
                                <li><a href="/product-type/{{$value->id}}">{{$value->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="#">THÚ BÔNG</a>
                        <ul class="sub-menu">
                            <li><a href="#">Thú bông Loài vật</a>
                                <ul class="sub-menu">
                                    @foreach($data['animal'] as $value)
                                        <li><a href="/product-type/{{$value->id}}">{{$value->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="#">Thú bông Khác</a>
                                <ul class="sub-menu">
                                    @foreach($data['another'] as $value)
                                        <li><a href="/product-type/{{$value->id}}">{{$value->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#">HOẠT HÌNH</a>
                        <ul class="sub-menu">
                            <li><a href="#">Gấu bông Hoạt hình</a>
                                <ul class="sub-menu">
                                    @foreach($data['cartoon'] as $value)
                                        <li><a href="/product-type/{{$value->id}}">{{$value->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="#">Gấu bông Hot</a>
                                <ul class="sub-menu">
                                    @foreach($data['hot'] as $value)
                                        <li><a href="/product-type/{{$value->id}}">{{$value->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#">PHỤ KIỆN</a>
                        <ul class="sub-menu">
                            <li><a href="#">Gối bông</a>
                                <ul class="sub-menu">
                                    @foreach($data['pillow'] as $value)
                                        <li><a href="/product-type/{{$value->id}}">{{$value->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>

                            <li><a href="#">Phụ kiện bông</a>
                                <ul class="sub-menu">
                                    @foreach($data['nani'] as $value)
                                        <li><a href="/product-type/{{$value->id}}">{{$value->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="/about">GIỚI THIỆU</a></li>
                    <li><a href="/contact">LIÊN HỆ</a></li>
                </ul>
                <div class="clearfix"></div>
            </nav>
        </div> <!-- .container -->
    </div> <!-- .header-bottom -->
</div> <!-- #header -->