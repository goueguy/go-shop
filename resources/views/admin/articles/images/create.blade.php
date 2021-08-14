@extends('layouts.admin')
@section('content')

<div class="col-md-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Ajouter Image</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <form class="form-label-left input_mask" action="#" method="POST">
                @csrf
                <div class="col-md-6 col-sm-4 form-group">
                    <label>Choisir l'Image de l'Articles</label>
                    <input type="file" name="file" class="form-control" id="inputSuccess2">
                </div>
                <div class="col-md-6 col-sm-4  form-group">
                    <label>Choisir l'Articles</label>
                    <select name="role" id="role" class="form-control">
                        <option>---SÉLECTIONNNER ARTICLES---</option>
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                            <option>D</option>
                    </select>
                </div>
                <div class="col-md-9 col-sm-9">
                    <button type="submit" class="btn btn-primary">AJOUTER</button>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection
