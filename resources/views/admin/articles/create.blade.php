@extends('layouts.admin')
@section('title','ARTICLES')
@section('content')
@include('layouts.includes._errors')
<div class="col-md-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Ajouter un Article</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <form class="form-label-left input_mask" action="{{route('admin.articles.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6 col-sm-6  form-group has-feedback">
                    <label for="name">Nom de l'Article</label>
                    <input type="text" name="name" class="form-control" id="inputSuccess2" value="{{old('name')}}">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3 col-sm-6  form-group has-feedback">
                    <label for="categorie">Catégorie</label>
                    <select name="categorie" id="categorie" class="form-control">
                        <option value="">---Choisir Catégorie---</option>
                        @foreach ($categories as $key=> $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('categorie')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3 col-sm-6  form-group has-feedback">
                    <label for="sous_categorie">Sous Catégorie</label>
                    <select name="sous_categorie" id="sous_categorie" class="form-control">
                        <option value="">---Choisir Sous Catégorie---</option>
                        {{-- @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach --}}
                    </select>
                    @error('sous_categorie')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 col-sm-6  form-group has-feedback">
                    <label for="provider">Vendeur ou Fournisseur</label>
                    <select name="provider" id="provider" class="form-control">
                        <option value="">---Choisir le Vendeur---</option>
                        @foreach ($providers as $provider)
                            <option value="{{$provider->id}}">{{$provider->name}}</option>
                        @endforeach
                    </select>
                    @error('provider')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 col-sm-6  form-group has-feedback">
                    <label for="images">Images</label>
                    <input type="file" name="images[]" class="form-control" id="inputSuccess2" value="{{old('images')}}" multiple>
                    @error('images')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12 col-sm-6  form-group has-feedback">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{old('description')}}</textarea>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3 col-sm-6  form-group has-feedback">
                    <label for="price">Prix</label>
                    <input type="number" name="price" class="form-control" id="inputSuccess4" value="{{old('price')}}">
                    @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3 col-sm-4  form-group has-feedback">
                    <label for="quantite">Quantité</label>
                    <input type="number" name="quantite" class="form-control" id="inputSuccess4" value="{{old('quantite')}}">
                    @error('quantite')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3 col-sm-4  form-group has-feedback">
                    <label for="statut">Statut de l'Articles</label>
                    <select name="statut" id="statut" class="form-control">
                        <option value="">---Choisir le statut---</option>
                        <option value="Actif" selected>Actif</option>
                        <option value="Inactif">Inactif</option>
                    </select>
                    @error('statut')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-3 col-sm-4  form-group has-feedback">
                    <label for="show_as_slider">Choisir comme Slider</label>
                    <select name="show_as_slider" id="show_as_slider" class="form-control">
                        <option value="">---Choisir le statut---</option>
                        <option value="0" selected>Non</option>
                        <option value="1">Oui</option>
                    </select>
                    @error('show_as_slider')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-9 col-sm-9">
                    <button type="submit" class="btn btn-primary">AJOUTER</button>
                </div>

            </form>
        </div>
    </div>

</div>

@endsection
@push('scripts')

<script type="text/javascript">
    $("document").ready(function(){
        $("#categorie").change(function(){
            let id = $(this).val();
            let url = "{{route('admin.categories.subcategories',":id")}}";
            url = url.replace(":id",id);
            $("#sous_categorie").find('option').not(':first').remove();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({

                url:url,
                type:"GET",
                dataType:"json",
                data:{id:id},
                success:function(success){
                    let ArrayData = 0;
                    ArrayData = success['data'].length;
                    if(ArrayData > 0){
                        for (let i = 0; i < ArrayData; i++) {
                            let id = success['data'][i].id;
                            let name = success['data'][i].name;
                            let option = "<option value='"+id+"'>"+name+"</option>"
                            $("#sous_categorie").append(option);
                        }
                    }
                },
                error:function(error){
                    console.log(error);
                }
            })
        });
    });
</script>
@endpush
