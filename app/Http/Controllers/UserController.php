<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('user.index',compact('users'));
    }
    public function create(){
        return view('user.create');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'password' => 'required'
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('user')->with('status','User Berhasil Di tambahkan');
        // dd("user berhasil di tambah");
    }
    public function edit($id){
        $users = User::find($id);
        return view('user.edit',compact('users'));
    }
    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->address = $request->address;
        $user->save();
        return redirect('user')->with('status','User Berhasil Di Ubah');
    }
    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return redirect('user')->with('status','User Berhasil Di Hapus');
    }
}
