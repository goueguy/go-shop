<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = User::orderBy('id','desc')->whereIn('id',[1,2,3])->get();
        return view('admin.users.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create',compact('roles'));
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
            "lastname"=>"required|min:3|string",
            "email"=>"required|unique:users",
            "password"=>"required|string|min:8",
            "role"=>"required"
        ]);
        $newUser = new User();
        $newUser->name = $request->name;
        $newUser->lastname = $request->lastname;
        $newUser->email = $request->email;
        $newUser->password = Hash::make($request->password);
        $newUser->role = $request->role;

        $response = ($newUser) ? [
            'status'=>'success',
            'message'=>'Utilisateur a été ajouté'
        ]:[
            'status'=>'error',
            'message'=>'Utilisateur n a pas été ajouté'
        ];

        return redirect()->route('admin.users.index')->with($response);
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
        $user = User::find($id);
        return view('admin.users.show',compact('roles','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::all();
        $user = User::find($id);
        return view('admin.users.edit',compact('roles','user'));
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
            "email"=>"required|unique:users,id,".$id,
            "role"=>"required"
        ]);
        $update = User::find($id);
        $update->update([
            "name"=>$request->name,
            "lastname"=>$request->lastname,
            "email"=>$request->email,
            "role_id"=>$request->role
        ]);
        $response = ($update) ? [
            'status'=>'success',
            'message'=>'Utilisateur a été modifié'
        ]:[
            'status'=>'error',
            'message'=>'Utilisateur n a pas été modifié'
        ];

        return redirect()->route('admin.users.index')->with($response);
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
            'message'=>'Utilisateur a été supprimé'
        ]:[
            'status'=>'error',
            'message'=>'Utilisateur n a pas été supprimé'
        ];

        return redirect()->route('admin.users.index')->with($response);
    }

    public function parametres(){
        return view("admin.users.settings.index");
    }
    public function password(){
        return view("admin.users.settings.password");
    }

    public function updateUserInfo(Request $request){
        //dd(Auth::user()->id);
        $request->validate([
            "name"=>"required|min:3|string",
            "lastname"=>"required|min:3|string",
            "telephone"=>"required|string",
            "email"=>"required|string",
        ]);

        $update = User::where('id',Auth::user()->id)->update([
            "name"=>$request->name,
            "lastname"=>$request->lastname,
            "telephone"=>$request->telephone,
            "email"=>$request->email
        ]);

        $response = ($update) ? [
            'status'=>'success',
            'message'=>'Information a été modifiée'
        ]:[
            'status'=>'error',
            'message'=>'Information a été modifiée'
        ];

        return redirect()->route('admin.users.parametres')->with($response);
    }
    public function updateUserPassword(Request $request){
        $request->validate([
            "old_password"=>"required|min:8",
            "password"=>"required|min:8",
            "password_confirmation"=>"required|min:8|same:password",
        ]);
        //dd($request->all());
        //password=john0000
        $userId =Auth::user()->id;
        $old_password = $request->old_password;
        $password = $request->password;
        $verifyPasswordExist = User::where("id", $userId)->first();

        if(Hash::check($old_password, $verifyPasswordExist->password)){
        $update = User::where("id", Auth::user()->id)->update(["password"=>Hash::make($password)]);
            $response = ($update) ? [
                'status'=>'success',
                'message'=>'Mot de passe a été modifié'
            ]:[
                'status'=>'error',
                'message'=>'Mot de passe n a pas été modifié'
            ];
            return redirect()->route('admin.users.parametres')->with($response);
        }

    }
}
