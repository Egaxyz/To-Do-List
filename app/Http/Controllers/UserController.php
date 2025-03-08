<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $user = User::all();

        return view('user.index', compact('user'));
    }
    public function store(Request $request){
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'kontak' => 'required',
            'gender' => 'required',
            'status_akun' => 'required',
        ]);
        $validate['password'] = bcrypt($validate['password']);
        $user = User::create($validate);

        return redirect()->route('user.index')->with('success', 'Data Berhasil Disimpan');
    }
    
    public function update(Request $request, $id){
        $user = User::find($id);

        $user -> name = $request->name;
        $user -> email = $request->email;
        $user -> password = bcrypt($request->password);
        $user -> kontak = $request->kontak;
        $user -> gender= $request->gender;
        $user -> status_akun = $request->status_akun;
        $user->save();
        
        return redirect()->route('user.index')->with('success', 'Data Berhasil Diperbarui');
    }
    
    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Data Berhasil Dihapus');
    }
}