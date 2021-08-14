@extends('layouts.admin')
@section('title','LISTE CLIENTS')
@section('content')
@include('layouts.includes._errors')
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Liste des Clients</h2>
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
                            @foreach ($clients as $key=> $client)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$client->name.' '.$client->lastname}}</td>
                                    <td>{{$client->email}}</td>
                                    <td>{{$client->telephone}}</td>
                                    <td>{{$client->role->name}}</td>
                                    <td>
                                        <a href="{{route('admin.clients.edit',['id'=>$client->id])}}"><i class="fa fa-edit"></i></a>
                                        <a href="{{route('admin.clients.delete',['id'=>$client->id])}}" onclick="return confirm('êtes-vous sûre ?');"><i class="fa fa-trash"></i></a>
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
