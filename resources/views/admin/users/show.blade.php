@extends('layouts.admin')
@section('title','UTILISATEURS')
@section('content')
<div class="col-md-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Détail Utilisateur</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
                <div class="col-md-6 col-sm-6  form-group has-feedback">
                    <input type="text" name="name" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Nom" value="{{$user->name}}" readonly>
                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                </div>

                <div class="col-md-6 col-sm-6  form-group has-feedback">
                    <input type="text" name="lastname" class="form-control has-feedback-left" id="inputSuccess3" placeholder="Prénoms" value="{{$user->lastname}}" readonly>
                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                </div>
                <div class="col-md-3 col-sm-6  form-group has-feedback">
                    <input type="email" name="email" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Email" value="{{$user->email}}" readonly>
                    <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                </div>
                <div class="col-md-3 col-sm-4  form-group has-feedback">
                    <select name="role" id="role" class="form-control has-feedback-left" readonly>
                        <option>---SÉLECTIONNNER RÔLE---</option>
                        @foreach ($roles as $role)
                            <option value="{{$role->id}}" {{($role->id==$user->role_id) ? 'selected':''}}>{{$role->name}}</option>
                        @endforeach

                    </select>
                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                </div>
                <div class="col-md-6 col-sm-6  form-group has-feedback">
                    <input type="tel" name="telephone" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Téléphone" value="{{$user->telephone}}" readonly>
                    <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                </div>

        </div>
    </div>

</div>
@endsection
