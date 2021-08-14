@extends('layouts.admin')
@section('content')

<div class="col-md-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Modifier Image</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <form class="form-label-left input_mask" action="{{route('admin.articles.images.update',['id'=>$image->id,'article_id'=>$article_id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-9 col-sm-4 form-group has-feedback">
                    <input type="file" name="images" class="form-control has-feedback-left" id="inputSuccess2">
                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    @error('images')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <input type="checkbox" name="show_as_slider" id="show_as_slider" value="1" {{($image->show_as_slider) ? 'checked':''}}> Définir cette image comme un slide
                </div>
                <div class="col-md-3">
                    <img src="{{asset('/uploads/pictures/'.$image->file)}}" width="100%" height="180px">
                </div>
                <div class="col-md-9 col-sm-9 mt-3">
                    <button type="submit" class="btn btn-danger">Changer Cette Image</button>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection
