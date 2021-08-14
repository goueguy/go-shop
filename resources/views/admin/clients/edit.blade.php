@extends('layouts.admin')
@section('title','MODIFIER CLIENT')
@section('content')
<div class="col-md-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Modifier Client</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <form class="form-label-left input_mask" action="{{route('admin.clients.update',['id'=>$user->id])}}" method="POST">
                @csrf
                <div class="col-md-4 col-sm-4 form-group has-feedback">
                    <input type="text" name="name" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Nom" value="{{$user->name}}">
                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 col-sm-4 form-group has-feedback">
                    <input type="text" name="lastname" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Prénoms" value="{{$user->lastname}}">
                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    @error('lastname')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 col-sm-4 form-group has-feedback">
                    <input type="email" name="email" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Email" value="{{$user->email}}">
                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-9 col-sm-9">
                    <button type="submit" class="btn btn-danger">MODIFIER</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
