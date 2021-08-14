@extends('layouts.frontend')

@section('content')
<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="/">Accueil<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="/login">{{__('content.Login')}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->
<!-- Shop Login -->
<section class="shop login section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-12">
                <div class="login-form">
                    <h2>{{__('content.Login')}}</h2>
                    <p>{{__('content.Please_register')}}</p>
                    <!-- Form -->
                    <form class="form" method="post" action="{{ route('login') }}">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>{{__('content.Your_Email')}}<span>*</span></label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>{{__('content.Your_Password')}}<span>*</span></label>
                                    <input type="password" name="password"  class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group login-btn">
                                    <button class="btn" type="submit">{{__('content.Login')}}</button>
                                    <a href="/register" class="btn float-right">{{__('content.Register')}}</a>
                                </div>
                                <a href="{{ route('password.request') }}" class="lost-pass float-right mt-5">{{__('content.Lost_your_password')}}?</a>
                            </div>
                        </div>
                    </form>
                    <!--/ End Form -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
