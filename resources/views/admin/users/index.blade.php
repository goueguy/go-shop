@extends('layouts.admin')
@section('title','UTILISATEURS')
@section('content')
@include('layouts.includes._errors')
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Liste des Utilisateurs</h2><span class="float-right font-weight-bold"><a href="{{route('admin.users.create')}}">Ajouter</a></span>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        <table id="data-list" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Nom Complet</th>
                                <th>Email</th>
                                <th>Téléphone</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$user->name.' '.$user->lastname}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->telephone}}</td>
                                    <td>{{$user->role->name}}</td>
                                    <td>
                                        <a href="{{route('admin.users.edit',['id'=>$user->id])}}"><i class="fa fa-edit"></i></a>
                                        <a href="{{route('admin.users.delete',['id'=>$user->id])}}" onclick="return confirm('Êtes-vous sûre ?');"><i class="fa fa-trash"></i></a>
                                        <a href="{{route('admin.users.show',['id'=>$user->id])}}"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
