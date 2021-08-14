@extends('layouts.admin')
@section('title','MENUS')
@section('content')

<div class="col-md-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Modifier ce Menu</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <form class="form-label-left input_mask" action="{{route('admin.menus.update',$menuItem->id)}}" method="POST">
                @csrf
                <div class="col-md-4 col-sm-12 form-group has-feedback">
                    <input type="text" name="name" class="form-control id="inputSuccess2" placeholder="Nom" value="{{$menuItem->name}}">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 col-sm-12 form-group has-feedback">
                    <input type="text" name="link" class="form-control" id="inputSuccess2" placeholder="Link" value="{{$menuItem->link}}">
                    @error('link')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 col-sm-12 form-group has-feedback">
                    <select name="status" id="status" class="form-control">
                        <option value="">---Choisir le Statut---</option>
                        <option value="Activé" {{($menuItem->status==="Activé") ? "selected":""}}>Activé</option>
                        <option value="Désactivé" {{($menuItem->status==="Désactivé") ? "selected":""}}>Désactivé</option>
                    </select>
                    @error('status')
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
