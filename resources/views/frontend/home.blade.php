@extends('layouts.frontend')
@section('content')
    
    @include("layouts.includes._frontend_hero-slider")
    @include("layouts.includes._frontend_small-banner")
    @include("layouts.includes._frontend_product-area")

    @include("layouts.includes._frontend_shop-home-list")
    @include("layouts.includes._frontend_shop-blog")
    @include("layouts.includes._frontend_shop-services")
	@include("layouts.includes._frontend_newsletter")
	@include("layouts.includes._frontend_modal")



@endsection
