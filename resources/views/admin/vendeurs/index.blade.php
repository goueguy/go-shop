@extends('layouts.admin')
@section('title','VENDEURS')
@section('content')
@include('layouts.includes._errors')
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Liste des Vendeurs</h2><span class="float-right font-weight-bold"><a href="{{route('admin.vendeurs.create')}}">Ajouter</a></span>
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
                                <th>Catégorie</th>
                                <th>Téléphone</th>
                                <th>Email</th>
                                <th>Localisation</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($providers as $key=> $provider)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$provider->name}}</td>
                                    <td>{{$provider->category->name}}</td>
                                    <td>{{$provider->telephone}}</td>
                                    <td>{{$provider->email}}</td>
                                    <td>{{$provider->localisation}}</td>
                                    <td>
                                        <a href="{{route('admin.vendeurs.edit',['id'=>$provider->id])}}"><i class="fa fa-edit"></i></a>
                                        <a href="{{route('admin.vendeurs.delete',['id'=>$provider->id])}}" onclick="return confirm('êtes vous sûre');"><i class="fa fa-trash"></i></a>
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
