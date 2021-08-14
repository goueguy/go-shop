@extends('layouts.admin')
@section('title','PROFILE')
@section('content')
@include('layouts.includes._errors')
<div class="col-md-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Profile</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <form class="form-label-left input_mask" action="{{route('admin.users.update.userinfo')}}" method="POST">
                @csrf
                <div class="col-md-6 col-sm-6  form-group has-feedback">
                    <input type="text" name="name" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Nom" value="{{Auth::user()->name}}">
                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 col-sm-6  form-group has-feedback">
                    <input type="text" name="lastname" class="form-control has-feedback-left" id="inputSuccess3" placeholder="Prénoms" value="{{Auth::user()->lastname}}">
                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    @error('lastname')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 col-sm-6  form-group has-feedback">
                    <input type="email" name="email" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Email" value="{{Auth::user()->email}}">
                    <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3 col-sm-4  form-group has-feedback">
                    <input type="text" name="role" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Role" readonly value="{{Auth::user()->role["name"]}}">
                    <span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
                    @error('role')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3 col-sm-4  form-group has-feedback">
                    <input type="tel" name="telephone" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Téléphone" value="{{Auth::user()->telephone}}">
                    <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                    @error('telephone')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-9 col-sm-9">
                    <button type="submit" class="btn btn-danger">CHANGER INFORMATION</button>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection
