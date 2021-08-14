<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Picture;
use App\Models\Category;
use App\Models\Provider;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ArticlePicture;
use App\Models\SousCategorie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['articles'] = Article::with('subcategory')->orderBy('id','desc')->get();
        return view('admin.articles.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $providers = Provider::all();
        return view('admin.articles.create',compact('categories','providers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"=>"required|min:3|string",
            "description"=>"required|min:3|string",
            "categorie"=>"required",
            "sous_categorie"=>"required",
            "price"=>"required|integer",
            "quantite"=>"required|integer",
            "statut"=>"required|string",
            "provider"=>"required|integer",
            "images"=>"required",
            "images.*"=>"image|mimes:png,jpg,jpeg|max:2048"

        ]);
        $newArticles = new Article();
        $newArticles->name = $request->name;
        $newArticles->description = $request->description;
        $newArticles->sous_categorie_id = $request->sous_categorie;
        $newArticles->price = $request->price;
        $newArticles->slug = Str::slug($request->name);
        $newArticles->user_id = Auth::user()->id;
        $newArticles->quantity = $request->quantite;
        $newArticles->statut = $request->statut;
        $newArticles->provider_id = $request->provider;
        $newArticles->save();
        $this->saveImages($request->hasFile('images'),$request->images, $newArticles->id);
        // if($request->hasFile('images')){
        //     foreach($request->file('images') as $image){

        //         $fileNameWithExtension= $image->getClientOriginalName();
        //         $fileName = pathinfo($fileNameWithExtension,PATHINFO_FILENAME);
        //         $extension = $image->getClientOriginalExtension();
        //         $fileNameToStore = $fileName .'_'.time().'.'.$extension;
        //         $image->move('uploads/pictures',$fileNameToStore);
        //         Picture::create([
        //             'article_id'=>$newArticles->id,
        //             'file'=>$fileNameToStore
        //         ]);
        //     }
        // }else{
        //     $fileNameToStore = "default.png";
        // }

        // ArticlePicture::create([
        //     "article_id"=>$articleId,
        //     "picture_id"=>$picture->id
        // ]);
        $response = ($newArticles) ? [
            'status'=>'success',
            'message'=>'Article a été ajouté'
        ]:[
            'status'=>'error',
            'message'=>'Article a n a pas été ajouté'
        ];

        return redirect()->route('admin.articles.index')->with($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::all();
        $providers = Provider::all();
        $subcategories = SousCategorie::all();
        $article = Article::find($id);
        return view('admin.articles.show',compact('categories','providers','article','subcategories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $subcategories = SousCategorie::all();
        $providers = Provider::all();
        $article = Article::find($id);
        return view('admin.articles.edit',compact('categories','providers','article','subcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "name"=>"required|min:3|string",
            "description"=>"required|min:3|string",
            "categorie"=>"required",
            "sous_categorie"=>"required",
            "price"=>"required|string",
            "quantite"=>"required|integer",
            "statut"=>"required|string",
            "provider"=>"required|integer",
        ]);
        //dd($request->all());
        $data = [
            "name"=>$request->name,
            "description"=>$request->description,
            "sous_categorie_id"=>$request->sous_categorie,
            "price"=>$request->price,
            "slug"=>Str::slug($request->name),
            "user_id"=>Auth::user()->id,
            "quantity"=>$request->quantite,
            "statut"=>$request->statut,
            "provider_id"=>$request->provider
        ];
        $update = Article::find($id)->update($data);
        //dd($update);
        $response = ($update) ? [
            "status"=>"success",
            "message"=>"Donnée de l'Article a été modifiée"
        ]:[
            "status"=>"error",
            "message"=>"Donnée de l'Article n'a pas été modifiée"
        ];
        return redirect()->route('admin.articles.index')->with($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Article::find($id);

        $delete = $data->delete();
        $images = Picture::where('article_id',$id)->get();
        foreach ($images as $value) {
            $file = public_path()."/uploads/pictures/".$value->file;
            if(file_exists($file)){
                File::delete($file);
            }
            Picture::where('article_id',$id)->delete();
        }

        $response = ($delete) ? [
            "status"=>"success",
            "message"=>"Article supprimée"
        ]:[
            "status"=>"error",
            "message"=>"Article n a pas été supprimée"
        ];
        return redirect()->route('admin.articles.index')->with($response);
    }
    public function saveImages($requestImages, $images,$articleId){
        if($requestImages){
            foreach($images as $image){

                $fileNameWithExtension= $image->getClientOriginalName();
                $fileName = pathinfo($fileNameWithExtension,PATHINFO_FILENAME);
                $extension = $image->getClientOriginalExtension();
                $fileNameToStore = $fileName .'_'.time().'.'.$extension;
                $image->move('uploads/pictures',$fileNameToStore);
                Picture::create([
                    'article_id'=>$articleId,
                    'file'=>$fileNameToStore,
                ]);

                // ArticlePicture::create([
                //     "article_id"=>$articleId,
                //     "picture_id"=>$picture->value('id')
                // ]);
            }
        }else{
            $fileNameToStore = "default.png";
        }
    }
}
