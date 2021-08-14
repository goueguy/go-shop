<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['roles'] = Role::orderBy('id','desc')->get();
        return view('admin.users.roles.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.roles.create',compact('roles'));
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
        $newRole = new Role();
        $newRole->name =$request->name;
        $newRole->slug =Str::slug($request->name);
        $newRole->save();

        $response = ($newRole) ? [
            'status'=>'success',
            'message'=>'Role a été ajouté'
        ]:[
            'status'=>'error',
            'message'=>'Role a n a pas été ajouté'
        ];

        return redirect()->route('admin.users.roles.index')->with($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $roles = Role::all();
        return view('admin.users.roles.show',compact('roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        return view('admin.users.roles.edit',compact('role'));
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
        $update = Role::find($id)->update([
            "name"=>$request->name,
            "slug"=>Str::slug($request->name)
        ]);

        $response = ($update) ? [
            'status'=>'success',
            'message'=>'Role a été modifié'
        ]:[
            'status'=>'error',
            'message'=>'Role a n a pas été modifié'
        ];

        return redirect()->route('admin.users.roles.index')->with($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Role::find($id);
        $data->permissions()->detach();
        $delete = $data->delete();
        $response = ($delete) ? [
            'status'=>'success',
            'message'=>'Role a été supprimé'
        ]:[
            'status'=>'error',
            'message'=>'Role a n a pas été supprimé'
        ];

        return redirect()->route('admin.users.roles.index')->with($response);
    }
}
