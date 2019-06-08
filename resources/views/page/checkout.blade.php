@extends('master')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="/">Trang chủ</a> / <span>Đặt hàng</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">

			<form action="/checkout" method="post" class="beta-form-checkout">
				<input type="hidden" name="_token" value="{{csrf_token()}}">

				<div class="row">
					<div class="col-sm-6">
						<h4>Thông tin khách hàng</h4>
						<div class="space20">&nbsp;</div>

						<div class="form-block">
							<label for="name">Họ tên*</label>
							<input type="text" id="name" name ="name" placeholder="Họ tên" required>
						</div>

						<div class="form-block">
							<label>Giới tính</label>
							<input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 20px"><span style="margin-right: 10%">Nam</span>
							<input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 20px"><span>Nữ</span>
						</div>

						<div class="form-block">
							<label for="email">Email*</label>
							<input type="email" name="email" id="email" placeholder="Email" required>
						</div>

						<div class="form-block">
							<label for="adress">Địa chỉ*</label>
							<input type="text" name="address" id="adress" placeholder="Địa chỉ" required>
						</div>

						<div class="form-block">
							<label for="phone">Điện thoại*</label>
							<input type="text" name="phone" id="phone" placeholder="Điện thoại" required>
						</div>
						
						<div class="form-block">
							<label for="notes">Ghi chú</label>
							<textarea name = "notes" id="notes" placeholder="Ghi chú"></textarea>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="your-order">
							<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
							<div class="your-order-body" style="padding: 0px 10px">
								<div class="your-order-item">
									<div>
										@if(Session::has('cart'))
										@foreach($product_cart as $cart)
										<!--  one item	 -->
											<div class="media">
												<img width="25%" src="" alt="" class="pull-left">
												<div class="media-body">
													<p class="font-large">{{$cart['item']['name']}} </p>
													<span class="color-gray your-order-info">Số lượng: {{$cart['qty']}}</span>
													<span class="color-gray your-order-info">Đơn giá: {{number_format($cart['price']/$cart['qty'])}}₫</span>
												</div>
											</div>
										<!-- end one item -->
										@endforeach
										@endif
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="your-order-item">
									<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
									<div class="pull-right"><p class="your-order-f18">{{number_format($totalPrice)}}₫</p></div>
									<div class="clearfix"></div>
								</div>
							</div>

							<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
							<div class="your-order-body">
								<ul class="payment_methods methods">
									<li class="payment_method_bacs">
										<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
										<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
										<div class="payment_box payment_method_bacs" style="display: block;">
											Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
										</div>						
									</li>

									<li class="payment_method_cheque">
										<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
										<label for="payment_method_cheque">Chuyển khoản </label>
										<div class="payment_box payment_method_cheque" style="display: none;">
											Chuyển tiền đến tài khoản sau:
											<br>- Số tài khoản: 123 456 789
											<br>- Chủ TK: Tân Vê Lốc
											<br>- Ngân hàng ABC, Chi nhánh TPHCM
										</div>						
									</li>
								</ul>
							</div>

							<div class="text-center"><button type="submit" class="beta-btn primary" href="">Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
						</div> <!-- .your-order -->
					</div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->

@endsection