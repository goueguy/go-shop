@extends('layouts.admin')
@section('title','MODIFIER CLIENT')
@section('content')
<div class="col-md-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Modifier le Client</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <form class="form-label-left input_mask" action="#" method="POST">
                @csrf
                <div class="col-md-12 col-sm-12  form-group has-feedback">
                    <input type="text" name="name" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Nom">
                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                </div>
                <div class="col-md-9 col-sm-9">
                    <button type="submit" class="btn btn-danger">MODIFIER</button>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection
