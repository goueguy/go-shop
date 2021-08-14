<?php

namespace App\Http\Controllers\Admin;

use App\Models\Provider;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CategoryProvider;

class VendeursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['providers'] = Provider::orderBy('id','desc')->get();
        $providers = Provider::all();

        return view("admin.vendeurs.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CategoryProvider::all();
        return view("admin.vendeurs.create",compact('categories'));
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
            "localisation"=>"required|min:3|string",
            "telephone"=>"required|string",
            "email"=>"required|email|unique:providers",
            "categorie"=>"required|string"
        ]);

        $newProvider = new Provider();
        $newProvider->name =$request->name;
        $newProvider->localisation = $request->localisation;
        $newProvider->telephone = $request->telephone;
        $newProvider->email = $request->email;
        $newProvider->category_provider_id = $request->categorie;
        $newProvider->save();

        $response = ($newProvider) ? [
            'status'=>'success',
            'message'=>'Vendeur a été ajouté'
        ]:[
            'status'=>'error',
            'message'=>'Vendeur a n a pas été ajouté'
        ];

        return redirect()->route('admin.vendeurs.index')->with($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("admin.vendeurs.show");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provider = Provider::find($id);
        $categories = CategoryProvider::all();
        return view("admin.vendeurs.edit",compact('provider','categories'));
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
            "email"=>"required|unique:providers,id,".$id,
            "localisation"=>"required|string",
            "telephone"=>"required|string",
            "categorie"=>"required|string"
        ]);

        $update = Provider::find($id)->update([
            "name"=>$request->name,
            "email"=>$request->email,
            "localisation"=>$request->localisation,
            "telephone"=>$request->telephone,
            "category_provider_id"=>$request->categorie
        ]);

        $response = ($update) ? [
            'status'=>'success',
            'message'=>'Vendeur a été modifié'
        ]:[
            'status'=>'error',
            'message'=>'Vendeur a n a pas été modifié'
        ];

        return redirect()->route('admin.vendeurs.index')->with($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Provider::find($id)->delete();

        $response = ($delete) ? [
            'status'=>'success',
            'message'=>'Fournisseur a été supprimé'
        ]:[
            'status'=>'error',
            'message'=>'Fournisseur a n a pas été supprimé'
        ];

        return redirect()->route('admin.vendeurs.index')->with($response);
    }
}
