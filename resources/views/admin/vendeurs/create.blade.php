@extends('layouts.admin')
@section('title','VENDEURS')
@section('content')
<div class="col-md-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Ajoute Un vendeur</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <form class="form-label-left input_mask" action="{{route('admin.vendeurs.store')}}" method="POST">
                @csrf
                <div class="col-md-6 col-sm-6  form-group has-feedback">
                    <input type="text" name="name" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Nom">
                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 col-sm-6  form-group has-feedback">
                    <input type="text" name="telephone" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Téléphone">
                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    @error('telephone')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3 col-sm-6  form-group has-feedback">
                    <input type="text" name="localisation" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Localisation">
                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    @error('localisation')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3 col-sm-6  form-group has-feedback">
                    <input type="email" name="email" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Adresse email">
                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 col-sm-6  form-group has-feedback">
                    <select name="categorie" id="categorie" class="form-control has-feedback-left">
                        <option value="">---Choisir une catégorie---</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    @error('categorie')
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
