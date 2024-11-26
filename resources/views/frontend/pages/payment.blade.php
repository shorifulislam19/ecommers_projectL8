@extends('frontend.master')
@section('content')

<div class="row">
    <div class="col-md-3"></div>
					<!-- Order Details -->
					<div class="col-md-6 order-details" style="margin-top: 100px;margin-bottom:80px">
						<div class="section-title text-center">
							<h3 class="title">Your Order</h3>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>PRODUCT</strong></div>
								<div><strong>TOTAL</strong></div>
							</div>

								@foreach ($cart_array as $cart )
							    <div class="order-products">
                                <div class="order-col">
									<div>{{ $cart['quantity'] }}x {{ $cart['name'] }}</div>
									<div>&#2547;{{ Cart::get($cart['id'])->getPriceSum() }}</div>
								</div>
                             </div>
                             @endforeach


							<div class="order-col">
								<div>Shiping</div>
								<div><strong>FREE</strong></div>
							</div>
							<div class="order-col">
								<div><strong>TOTAL</strong></div>
								<div><strong class="order-total">&#2547;{{ cart::getTotal() }}</strong></div>
							</div>
						</div>


                        <form action="{{ url('/place-order') }}" method="post">
                            @csrf
                            <div class="section-title text-center" style="margin-top: 40px">
                                <h4 class="title" style="color: rgb(213, 14, 14)"> Please select Payment system</h4>

                            </div>

                            <div class="payment-method">
                                <div class="input-radio">
                                    <input type="radio" name="payment_method" id="payment-1" value="cash">
                                    <label for="payment-1">
                                        <span></span>
                                        Cash On Delivery
                                    </label>
                                    <div class="caption">
                                        <p>You can also select Cash On Delivery.</p>
                                    </div>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="payment_method" id="payment-2" value="bkash">
                                    <label for="payment-2">
                                        <span></span>
                                        Bkash
                                    </label>
                                    <div class="caption">
                                        <p>Bkash No : 01........</p>
                                    </div>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="payment_method" id="payment-3" value="nogod">
                                    <label for="payment-3">
                                        <span></span>
                                        Nogod
                                    </label>
                                    <div class="caption">
                                            <p>Nogod No : 01........</p>
                                    </div>
                                </div>
                            </div>
                            <div class="input-checkbox">
                                <input type="checkbox" id="terms">
                                <label for="terms">
                                    <span></span>
                                    I've read and accept the <a href="#">terms & conditions</a>
                                </label>
                            </div>
                            <input type="submit" class="primary-btn order-submit" style="float:right;" value="Place Order">
                        </form>

					</div>
					<!-- /Order Details -->
                    <div class="col-md-3"></div>
</div>
@endsection
