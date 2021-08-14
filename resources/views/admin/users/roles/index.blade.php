@extends('layouts.admin')
@section('title','LISTE RÔLES')
@section('content')
@include('layouts.includes._errors')
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Liste des Roles</h2><span class="float-right font-weight-bold"><a href="{{route('admin.users.roles.create')}}">Ajouter</a></span>
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
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $key=>$role)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$role->name}}</td>
                                        <td>
                                            <a href="{{route('admin.users.permissions.role.edit',['id'=>$role->id])}}" title="Assigner des Permissions à ce Rôle"><i class="fa fa-lock"></i></a>
                                            <a href="{{route('admin.users.roles.edit',['id'=>$role->id])}}"><i class="fa fa-edit"></i></a>
                                            <a href="{{route('admin.users.roles.delete',['id'=>$role->id])}}" onclick="return confirm('êtes-vous sûre');"><i class="fa fa-trash"></i></a>
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
