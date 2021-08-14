<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Picture;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['images'] = Picture::orderBy('id','desc')->get();
        return view('admin.articles.images.index',$data);
    }

    public function list($id)
    {
        $article = Article::find($id);
        $images = Picture::orderBy('id','desc')->get();
        return view('admin.articles.liste-images',compact('images','article'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.articles.images.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $request->validate([
            "images"=>"required",
            "images.*"=>"image|mimes:png,jpg,jpeg|max:2048"
        ]);
        $newArticles = new ArticlesController();
        $added = $newArticles->saveImages($request->hasFile('images'),$request->images,$id);
        $response = ($added) ? [
            "status"=>"success",
            "message"=>"Images ajoutées"
        ]:[
            "status"=>"error",
            "message"=>"Images n'ont pas été ajoutées"
        ];
        return redirect()->route('admin.articles.images.list',$id)->with($response);
    }
    public function add(Request $request,$id)
    {
        $article = Article::find($id);
        return view('admin.articles.images.add',compact('article'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.articles.images.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($article_id,$id)
    {
        $image = Picture::find($id);
        return view('admin.articles.images.edit',compact('image','article_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$article_id,$id)
    {
        $request->validate([
            "images"=>"image|mimes:png,jpg,jpeg|max:2048",
            "show_as_slider"=>"required|boolean"
        ]);
        //dd($request->all());
        $data = Picture::find($id);
        $image = $request->hasFile('images');
        if($image){
            $fileNameWithExtension= $request->file('images')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension,PATHINFO_FILENAME);
            $extension = $request->file('images')->getClientOriginalExtension();
            $fileNameToStore = $fileName .'_'.time().'.'.$extension;
            $image_path = public_path()."/uploads/pictures/".$data->file;
            if(file_exists($image_path)){
                File::delete($image_path);
            }
            $request->file('images')->move('uploads/pictures',$fileNameToStore);
        }else{
            $fileNameToStore = $data->file;
        }
        $update = $data->update(['file'=>$fileNameToStore,'show_as_slider'=>$request->show_as_slider]);
        $response = ($update) ? [
            'status'=>'success',
            'message'=>'Image a été modifiée'
        ]:[
            'status'=>'error',
            'message'=>'Image n a pas été modifiée'
        ];

        return redirect()->route('admin.articles.images.list',$article_id)->with($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($article_id,$id)
    {
        $data = Picture::find($id);
        $file = public_path()."/uploads/pictures/".$data->file;
            if(file_exists($file)){
                File::delete($file);
            }
        $delete = $data->delete();
        $response = ($delete) ? [
            'status'=>'success',
            'message'=>'Image a été asupprimée'
        ]:[
            'status'=>'error',
            'message'=>'Image n a pas été supprimée'
        ];

        return redirect()->route('admin.articles.images.list',$article_id)->with($response);
    }
}
