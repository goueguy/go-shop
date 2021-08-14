@extends('layouts.admin')
@section('title','ARTICLES')
@section('content')
@include('layouts.includes._errors')
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Liste Des articles</h2><span class="float-right font-weight-bold"><a href="{{route('admin.articles.create')}}">Ajouter</a></span>
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
                                    <th>Images</th>
                                    <th>Prix</th>
                                    <th>Quantité</th>
                                    <th>Categorie</th>
                                    <th>Vendeur</th>
                                    <th>Statut</th>
                                    <th>Utilisé Comme Slider</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($articles as $key=> $article)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$article->name}}</td>
                                        <td>{{Str::limit($article->description,20)}}</td>
                                        <td><a href="{{route('admin.articles.images.list',['id'=>$article->id])}}"><i class="fa fa-picture-o"></i> Voir</a></td>
                                        <td>{{$article->price}}</td>
                                        <td>{{$article->quantity}}</td>
                                        <td>{{$article->subcategory->category->name}}</td>
                                        <td>{{$article->provider->name}}</td>
                                        <td>{{$article->statut}}</td>
                                        <td>{{($article->show_as_sliders) ? 'Oui':'Non'}}</td>
                                        <td>
                                            <a href="{{route('admin.articles.edit',['id'=>$article->id])}}"><i class="fa fa-edit"></i></a>
                                            <a href="{{route('admin.articles.delete',['id'=>$article->id])}}" onclick="return confirm('êtes-vous sûre ?');"><i class="fa fa-trash"></i></a>
                                            <a href="{{route('admin.articles.show',['id'=>$article->id])}}"><i class="fa fa-eye"></i></a>
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
