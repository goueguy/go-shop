@extends('layouts.admin')
@section('title','DÉTAIL RÔLE')
@section('content')
<div class="col-md-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Détail Du Role User</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <form class="form-label-left input_mask" action="#" method="POST">
                @csrf
                <div class="col-md-12 col-sm-12 form-group has-feedback">
                    <input type="text" name="name" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Nom">
                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                </div>

                <div class="col-md-6 col-sm-6  form-group has-feedback">
                    <input type="email" name="email" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Email">
                    <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                </div>
                <div class="col-md-6 col-sm-4  form-group has-feedback">
                    <select name="role" id="role" class="form-control has-feedback-left">
                        <option>---SÉLECTIONNNER RÔLE---</option>
                        @foreach ($roles as $role)
                            <option>{{$role->name}}</option>
                        @endforeach

                    </select>
                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection
