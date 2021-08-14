@extends('layouts.frontend')
@section('content')
@section('sidebar')
@stop

    <!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="/">Accueil<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="{{route('panier.checkout')}}">Paiments</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->

    <!-- Start Checkout -->
		<section class="shop checkout section">
			<div class="container">
				<div class="row">
                        <div class="col-lg-4">
                            <div class="order-details">
                                <!-- Order Widget -->
                                <div class="single-widget">
                                    <h2>TOTALS PANIER</h2>
                                    <div class="content">
                                        <ul>
                                            <li>Sub Total<span>$330.00</span></li>
                                            <li>(+) Shipping<span>$10.00</span></li>
                                            <li class="last">Total<span>$340.00</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <!--/ End Order Widget -->
                                <!-- Order Widget -->
                                <div class="single-widget">
                                    <h2>Mode de Paiements</h2>
                                    <div class="content">
                                        <div class="checkbox">
                                            <label class="checkbox-inline" for="1"><input name="updates" id="1" type="checkbox"> Check Payments</label>
                                            <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"> Cash On Delivery</label>
                                            <label class="checkbox-inline" for="3"><input name="news" id="3" type="checkbox"> PayPal</label>
                                        </div>
                                    </div>
                                </div>
                                <!--/ End Order Widget -->
                                <!-- Payment Method Widget -->
                                <div class="single-widget payement">
                                    <div class="content">
                                        <img src="images/payment-method.png" alt="#">
                                    </div>
                                </div>
                                <!--/ End Payment Method Widget -->
                                <!-- Button Widget -->
                                <div class="single-widget get-button">
                                    <div class="content">
                                        <div class="button">
                                            <a href="#" class="btn">Valider le paiments</a>
                                        </div>
                                    </div>
                                </div>
                                <!--/ End Button Widget -->
                            </div>
                        </div>


				</div>
			</div>
		</section>
		<!--/ End Checkout -->


@endsection
