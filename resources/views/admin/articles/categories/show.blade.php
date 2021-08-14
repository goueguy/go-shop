@extends('layouts.admin')
@section('content')

<div class="col-md-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Détail Du Sous Categories</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <form class="form-label-left input_mask" action="#" method="POST">
                @csrf
                <div class="col-md-6 col-sm-4  form-group">
                    <input type="text" class="form-control" value="" placeholder="Détails de la categorie"/>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
