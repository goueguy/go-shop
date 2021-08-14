@extends('layouts.admin')
@section('title','PERMISSIONS')
@section('content')
<div class="col-md-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Ajouter des Permissions</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <form class="form-label-left input_mask" action="{{route('admin.users.permissions.store')}}" method="POST">
                @csrf
                <div class="col-md-6 col-sm-12 form-group has-feedback">
                    <input type="text" name="name" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Nom">
                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 col-sm-12 form-group has-feedback">
                    <input type="text" name="description" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Descrption">
                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    @error('description')
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
