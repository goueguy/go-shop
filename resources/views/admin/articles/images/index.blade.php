@extends('layouts.admin')
@section('title','IMAGES DES ARTICLES')
@section('content')
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Liste des Images</h2>
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
                                    <th>Image</th>
                                    <th>Article</th>
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($images as $key=> $image)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td><img src="{{asset('/uploads/pictures/'.$image->file)}}" width="50px" height="50px"></td>
                                        <td>{{$image->article->name}}</td>
                                        {{-- <td>
                                            <a href="{{route('admin.articles.images.delete',['id'=>$image->id,'article_id'=>$image->article->id])}}"><i class="fa fa-edit"></i></a>
                                            <a href=""><i class="fa fa-trash"></i></a>
                                        </td> --}}
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

