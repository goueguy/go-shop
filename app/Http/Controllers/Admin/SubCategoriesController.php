<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\SousCategorie;
use App\Http\Controllers\Controller;

class SubCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['subcategories'] = SousCategorie::orderBy('id','desc')->get();
        return view('admin.articles.subcategories.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.articles.subcategories.create',compact('categories'));
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
            "category"=>"required"
        ]);
        $newSubCategory = new SousCategorie();
        $newSubCategory->name = $request->name;
        $newSubCategory->slug = Str::slug($request->name);
        $newSubCategory->category_id = $request->category;
        $newSubCategory->save();

        $response = ($newSubCategory) ? [
            'status'=>'success',
            'message'=>'Sous Catégorie a été ajoutée'
        ]:[
            'status'=>'error',
            'message'=>'Sous Catégorie a n a pas été ajoutée'
        ];
        return redirect()->route('admin.articles.subcategories.index')->with($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.articles.subcategories.show');
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
        $subcategory = SousCategorie::find($id);
        return view('admin.articles.subcategories.edit',compact('subcategory','categories'));
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
            "category"=>"required"
        ]);
        $update = SousCategorie::find($id)->update([
            "name"=>$request->name,
            "slug"=>Str::slug($request->name),
            "category_id"=>$request->category
        ]);

        $response = ($update) ? [
            'status'=>'success',
            'message'=>'Sous Catégorie a été modifiée'
        ]:[
            'status'=>'error',
            'message'=>'Sous Catégorie a n a pas été modifiée'
        ];

        return redirect()->route('admin.articles.subcategories.index')->with($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = SousCategorie::find($id)->delete();

        $response = ($delete) ? [
            'status'=>'success',
            'message'=>'Sous Catégorie a été supprimée'
        ]:[
            'status'=>'error',
            'message'=>'Sous Catégorie n a pas été supprimée'
        ];

        return redirect()->route('admin.articles.subcategories.index')->with($response);
    }

    public function getSubCategorieByCategorie($id){
        $data = SousCategorie::where('category_id',$id)->get();
        return response()->json(["code"=>200,"data"=>$data]);
    }
}
