<?php

namespace App\Http\Controllers\Admin;

use App\Models\MenuItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['menus_items'] = MenuItem::orderBy('id','desc')->get();
        return view('admin.menus.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.menus.create');
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
            "status"=>"required|string|min:3",
            "link"=>"required|string|min:1"
        ]);

        $newItem = new MenuItem();
        $newItem->name =$request->name;
        $newItem->link =$request->link;
        $newItem->status =$request->status;
        $newItem->save();

        $response = ($newItem) ? [
            'status'=>'success',
            'message'=>'Menu Item a été ajouté'
        ]:[
            'status'=>'error',
            'message'=>'Menu Item a n a pas été ajouté'
        ];

        return redirect()->route('admin.menus.index')->with($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $menuItem = MenuItem::find($id);
        return view('admin.menus.edit',compact('menuItem'));
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
            "status"=>"required|string|min:3",
            "link"=>"required|string|min:1"
        ]);
        $update = MenuItem::find($id)->update([
            "name"=>$request->name,
            "status"=>$request->status,
            "link"=>$request->link
        ]);

        $response = ($update) ? [
            'status'=>'success',
            'message'=>'Menu Item a été modifié'
        ]:[
            'status'=>'error',
            'message'=>'Menu Item a n a pas été modifié'
        ];
        return redirect()->route('admin.menus.index')->with($response);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = MenuItem::find($id)->delete();
        $response = ($delete) ? [
            'status'=>'success',
            'message'=>'Menu Item a été supprimé'
        ]:[
            'status'=>'error',
            'message'=>'Menu Item a n a pas été supprimé'
        ];

        return redirect()->route('admin.menus.index')->with($response);
    }
}
