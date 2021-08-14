@extends('layouts.admin')
@section('title','MENUS')
@section('content')
@include('layouts.includes._errors')
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Liste des Menus</h2><span class="float-right font-weight-bold"><a href="{{route('admin.menus.create')}}">Ajouter</a></span>
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
                                    <th>Name</th>
                                    <th>Link</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menus_items as $key=>$menu_item)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$menu_item->name}}</td>
                                        <td>{{$menu_item->link}}</td>
                                        <td>{{$menu_item->status}}</td>
                                        <td>
                                            <a href="{{route('admin.menus.edit',['id'=>$menu_item->id])}}"><i class="fa fa-edit"></i></a>
                                            <a href="{{route('admin.menus.delete',['id'=>$menu_item->id])}}" onclick="return confirm('êtes-vous sûre');"><i class="fa fa-trash"></i></a>
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
