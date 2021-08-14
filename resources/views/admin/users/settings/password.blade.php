@extends('layouts.admin')
@section('title','MOT DE PASSE')
@section('content')
<div class="col-md-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Mot de passe</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <form class="form-label-left input_mask" action="{{route('admin.users.update-password')}}" method="POST">
                @csrf
                <div class="col-md-4 col-sm-6  form-group has-feedback">
                    <input type="password" name="old_password" class="form-control has-feedback-left" id="old_password" placeholder="Ancien Mot de passe">
                    <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                    @error('old_password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 col-sm-6  form-group has-feedback">
                    <input type="password" name="password" class="form-control has-feedback-left" id="password" placeholder="Nouveau Mot de passe">
                    <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 col-sm-6  form-group has-feedback">
                    <input type="password" name="password_confirmation" class="form-control has-feedback-left" id="password_confirmation" placeholder="Confimer Mot de passe" >
                    <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                    @error('password_confirmation')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-9 col-sm-9">
                    <button type="submit" class="btn btn-danger">CHANGER MOT DE PASSE</button>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection
