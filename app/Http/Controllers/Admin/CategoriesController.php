<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = Category::orderBy('id','desc')->get();
        return view('admin.articles.categories.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.articles.categories.create');
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
            "name"=>"required|min:3|string"
        ]);
        $newCategory = new Category();
        $newCategory->name = $request->name;
        $newCategory->slug = Str::slug($request->name);
        $newCategory->save();

        $response = ($newCategory) ? [
            'status'=>'success',
            'message'=>'Catégorie a été ajoutée'
        ]:[
            'status'=>'error',
            'message'=>'Catégorie a n a pas été ajoutée'
        ];
        return redirect()->route('admin.articles.categories.index')->with($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.articles.categories.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.articles.categories.edit',compact('category'));
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
            "name"=>"required|min:3|string"
        ]);
        $update =Category::find($id)->update([
            "name"=>$request->name,
            "slug"=>Str::slug($request->name)
        ]);

        $response = ($update) ? [
            'status'=>'success',
            'message'=>'Catégorie a été modifiée'
        ]:[
            'status'=>'error',
            'message'=>'Catégorie a n a pas été modifiée'
        ];

        return redirect()->route('admin.articles.categories.index')->with($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Category::find($id)->delete();

        $response = ($delete) ? [
            'status'=>'success',
            'message'=>'Catégorie a été supprimée'
        ]:[
            'status'=>'error',
            'message'=>'Catégorie n a pas été supprimée'
        ];

        return redirect()->route('admin.articles.categories.index')->with($response);
    }
}
