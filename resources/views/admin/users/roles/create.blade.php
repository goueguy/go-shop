@extends('layouts.admin')
@section('title','AJOUTER RÔLE')
@section('content')
<div class="col-md-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Ajouter des Roles</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <form class="form-label-left input_mask" action="{{route('admin.users.roles.store')}}" method="POST">
                @csrf
                <div class="col-md-12 col-sm-12 form-group has-feedback">
                    <input type="text" name="name" class="form-control has-feedback-left @error('name') is-invalid @enderror" id="inputSuccess2" placeholder="Nom" value="{{old('name')}}">
                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-9 col-sm-9">
                    <button type="submit" class="btn btn-primary">AJOUTER</button>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection
