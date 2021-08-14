@extends('layouts.admin')
@section('title','PERMISSIONS')
@section('content')
@include('layouts.includes._errors')
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Liste des Permissions</h2><span class="float-right font-weight-bold"><a href="{{route('admin.users.permissions.create')}}">Ajouter</a></span>
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
                                <th>Nom</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions  as $key=> $permission)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$permission->name}}</td>
                                    <td>{{$permission->description}}</td>
                                    <td>
                                        <a href="{{route('admin.users.permissions.edit',['id'=>$permission->id])}}"><i class="fa fa-edit"></i></a>
                                        <a href="{{route('admin.users.permissions.delete',['id'=>$permission->id])}}" onclick="return confirm('Êtes-vous sûre ?');"><i class="fa fa-trash"></i></a>
                                        {{-- <a href="{{route('admin.users.permissions.show',['id'=>$permission->id])}}"><i class="fa fa-eye"></i></a> --}}
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
