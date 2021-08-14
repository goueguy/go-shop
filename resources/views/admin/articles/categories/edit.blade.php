@extends('layouts.admin')
@section('title','CATÉGORIES')
@section('content')
<div class="col-md-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Modifier Une Categorie</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <form class="form-label-left input_mask" action="{{route('admin.articles.categories.update',$category->id)}}" method="POST">
                @csrf
                <div class="col-md-12 col-sm-12 form-group has-feedback">
                    <input type="text" name="name" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Nom" value="{{$category->name}}">
                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    @error('name')
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
