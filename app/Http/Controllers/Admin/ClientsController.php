<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['clients'] = User::orderBy('id','desc')->where('role_id',4)->get();
        return view('admin.clients.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.clients.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.clients.edit',compact('user'));
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
            "lastname"=>"required|min:3|string",
            "email"=>"required|unique:users,id,".$id
        ]);
        $update = User::find($id);
        $update->update([
            "name"=>$request->name,
            "lastname"=>$request->lastname,
            "email"=>$request->email
        ]);
        $response = ($update) ? [
            'status'=>'success',
            'message'=>'Client a été modifié'
        ]:[
            'status'=>'error',
            'message'=>'Client n a pas été modifié'
        ];

        return redirect()->route('admin.clients.index')->with($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = User::find($id)->delete();

        $response = ($delete) ? [
            'status'=>'success',
            'message'=>'Client a été supprimé'
        ]:[
            'status'=>'error',
            'message'=>'Client n a pas été supprimé'
        ];

        return redirect()->route('admin.clients.index')->with($response);
    }
}
