@extends('layouts.admin')
@section('title','IMAGES DES ARTICLES')
@section('content')
<div class="col-md-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Images</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <form class="form-label-left input_mask" action="{{route('admin.articles.images.store',$article->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12 col-sm-4 form-group has-feedback">
                    <input type="file" name="images[]" class="form-control has-feedback-left" id="inputSuccess2" multiple>
                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                </div>

                <div class="col-md-9 col-sm-9">
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection
