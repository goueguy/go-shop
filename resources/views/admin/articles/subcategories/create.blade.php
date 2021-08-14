@extends('layouts.admin')
@section('title','SOUS CATÉGORIES')
@section('content')
@section('content')

<div class="col-md-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Ajoute une sous Categorie</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <form class="form-label-left input_mask" action="{{route('admin.articles.subcategories.store')}}" method="POST">
                @csrf
                <div class="col-md-6 col-sm-12 form-group">
                    <input type="text" name="name" class="form-control" id="inputSuccess2" placeholder="Nom" value="{{old('name')}}">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 col-sm-4  form-group">
                    <select name="category" id="category" class="form-control">
                        <option value="">---Choisir une Catégorie---</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                    </select>
                    @error('category')
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
