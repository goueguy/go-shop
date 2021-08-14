@extends('layouts.admin')
@section('content')
<div class="x_panel">
    <div class="x_title">
        <h2>Liste des Images de l'Article: <strong>{{$article->name}}</strong></h2><span class="float-right font-weight-bold"><a href="{{route('admin.articles.images.add',$article->id)}}">Ajouter</a> | <a href="{{route('admin.articles.index')}}">Retour</a></span>
        <div class="clearfix"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box table-responsive">
                    <table id="data-list" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($images as $key=> $image)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td><img src="{{asset('/uploads/pictures/'.$image->file)}}" width="100px" height="100px"></td>
                                    <td>
                                        <a href="{{route('admin.articles.images.edit',['id'=>$image->id,'article_id'=>$article->id])}}"><i class="fa fa-edit"></i></a>
                                        <a href="{{route('admin.articles.images.delete',['id'=>$image->id,'article_id'=>$article->id])}}" onclick="return confirm('Êtes-vous sûre ?');"><i class="fa fa-trash"></i></a>
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

@endsection
