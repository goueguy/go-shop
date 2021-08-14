@extends('layouts.admin')
@section('title','ARTICLES')
@section('content')
@include('layouts.includes._errors')
<div class="col-md-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Modifier l'Article: {{$article->name}}</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <form class="form-label-left input_mask" action="{{route('admin.articles.update',$article->id)}}" method="POST">
                @csrf
                <div class="col-md-6 col-sm-6  form-group has-feedback">
                    <label for="name">Nom de l'Article</label>
                    <input type="text" name="name" class="form-control" id="inputSuccess2" value="{{$article->name}}">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3 col-sm-6  form-group has-feedback">
                    <label for="categorie">Catégorie</label>
                    <select name="categorie" id="categorie" class="form-control">
                        <option value="">---Choisir Catégorie---</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{($category->id===$article->subcategory->category->id) ? 'selected':''}}>{{$category->name}}</option>
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
                        @foreach ($subcategories as $subcategorie)
                            <option value="{{$subcategorie->id}}" {{($subcategorie->id===$article->subcategory->id) ? 'selected':''}}>{{$subcategorie->name}}</option>
                        @endforeach
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
                            <option value="{{$provider->id}}" {{($provider->id===$article->provider_id) ? 'selected':''}}>{{$provider->name}}</option>
                        @endforeach
                    </select>
                    @error('provider')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- <div class="col-md-6 col-sm-6  form-group has-feedback">
                    <label for="images">Images</label>
                    <input type="file" name="images[]" class="form-control" id="inputSuccess2" value="{{old('images')}}" multiple>
                    @error('images')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div> --}}
                <div class="col-md-6 col-sm-4  form-group has-feedback">
                    <label for="quantite">Quantité</label>
                    <input type="number" name="quantite" class="form-control" id="inputSuccess4" value="{{$article->quantity}}">
                    @error('quantite')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12 col-sm-6  form-group has-feedback">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{$article->description}}</textarea>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 col-sm-6  form-group has-feedback">
                    <label for="price">Prix</label>
                    <input type="number" name="price" class="form-control" id="inputSuccess4" value="{{$article->price}}">
                    @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4 col-sm-4  form-group has-feedback">
                    <label for="statut">Statut de l'Articles</label>
                    <select name="statut" id="statut" class="form-control">
                        <option value="">---Choisir le statut---</option>
                        <option value="Actif" {{($article->statut==="Actif") ? "selected":""}}>Actif</option>
                        <option value="Inactif" {{($article->statut==="Inactif") ? "selected":""}}>Inactif</option>
                    </select>
                    @error('statut')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 col-sm-4  form-group has-feedback">
                    <label for="show_as_slider">Choisir comme Slider</label>
                    <select name="show_as_slider" id="show_as_slider" class="form-control">
                        <option value="">---Choisir le statut---</option>
                        <option value="0" {{(!$article->show_as_slider) ? 'selected':''}}>Non</option>
                        <option value="1" {{($article->show_as_slider) ? 'selected':''}}>Oui</option>
                    </select>
                    @error('show_as_slider')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-9 col-sm-9">
                    <button type="submit" class="btn btn-danger">MODIFIER</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
