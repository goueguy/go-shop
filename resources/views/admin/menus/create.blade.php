@extends('layouts.admin')
@section('title','MENUS')
@section('content')

<div class="col-md-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Ajouter des Menus</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <form class="form-label-left input_mask" action="{{route('admin.menus.store')}}" method="POST">
                @csrf
                <div class="col-md-4 col-sm-12 form-group has-feedback">
                    <input type="text" name="name" class="form-control id="inputSuccess2" placeholder="Nom" value="{{old('name')}}">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 col-sm-12 form-group has-feedback">
                    <input type="text" name="link" class="form-control" id="inputSuccess2" placeholder="Link" value="{{old('link')}}">
                    @error('link')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 col-sm-12 form-group has-feedback">
                    <select name="status" id="status" class="form-control">
                        <option value="">---Choisir le Statut---</option>
                        <option value="Activé">Activé</option>
                        <option value="Désactivé">Désactivé</option>
                    </select>
                    @error('status')
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
