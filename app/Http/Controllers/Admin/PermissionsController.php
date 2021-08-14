<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['permissions'] = Permission::all();
        return view("admin.users.permissions.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.users.permissions.create");
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
            "description"=>"required|string|min:3"
        ]);

        $newPermission = new Permission();
        $newPermission->name =$request->name;
        $newPermission->description =$request->description;
        $newPermission->save();
        $response = ($newPermission) ? [
            'status'=>'success',
            'message'=>'Permission été ajoutée'
        ]:[
            'status'=>'error',
            'message'=>'Permission n a pas été ajoutée'
        ];
        return redirect()->route('admin.users.permissions.index')->with($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("admin.users.permissions.show");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::find($id);
        return view("admin.users.permissions.edit",compact('permission'));
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
            "description"=>"required|string|min:3"
        ]);
        $update = Permission::find($id)->update([
            "name"=>$request->name,
            "description"=>$request->description
        ]);
        $response = ($update) ? [
            'status'=>'success',
            'message'=>'Permission été modifiée'
        ]:[
            'status'=>'error',
            'message'=>'Permission n a pas été modifiée'
        ];
        return redirect()->route('admin.users.permissions.index')->with($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Permission::find($id)->delete();
        $response = ($delete) ? [
            'status'=>'success',
            'message'=>'Permission été supprimée'
        ]:[
            'status'=>'error',
            'message'=>'Permission n a pas été supprimée'
        ];
        return redirect()->route('admin.users.permissions.index')->with($response);
    }

    public function editRolePermission($id){
        $role = Role::find($id);
        $permissions = Permission::all();
        return view('admin.users.permissions.assign-permissions',compact('permissions','role'));
    }
    public function updateRolePermission(Request $request, $id){
        $request->validate([
            "permissions"=>"required"
        ]);
        $role = Role::find($id);
        $update = $role->permissions()->sync($request->permissions);
        $response = ($update) ? [
            "status"=>"success",
            "message"=>"Permissions ont été modifiées"
        ]:[
            "status"=>"error",
            "message"=>"Permissions n ont pas été modifiées"
        ];

        return redirect()->route('admin.users.roles.index')->with($response);
    }
}
