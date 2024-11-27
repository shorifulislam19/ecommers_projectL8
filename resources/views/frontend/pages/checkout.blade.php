@extends('frontend.master')
@section('content')
        <!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
                    <div class="col-md-2"></div>

					<div class="col-md-8">
						<!-- Billing Details -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

					<form action="{{ url('/save-shipping-address') }}" method="POST">
                        @csrf
                        <div class="billing-details">
							<div class="section-title">
								<h3 class="title">Shipping address</h3>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="name" placeholder="Enter Your Name">
							</div>
							<div class="form-group">
								<input class="input" type="email" name="email" placeholder="Email">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="address" placeholder="Address">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="city" placeholder="City">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="country" placeholder="Country">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="zip_code" placeholder="ZIP Code">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="mobile" placeholder="Mobile NUmber">
							</div>
						</div>
                        <input type="submit" class="primary-btn order-submit" value="Next" style="float:right;">
                    </form>
						<!-- /Billing Details -->

					</div>
                    <div class="col-md-2"></div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

        @endsection
