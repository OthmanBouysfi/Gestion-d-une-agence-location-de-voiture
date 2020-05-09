<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Command;

use Illuminate\Support\Facades\Hash;
class UsersController extends Controller
{
    public function login(){
        return view('users.login');
    }
    public function show($id)
    {
        return view('users.show')->withUser(User::findOrFail($id));
    }

    public function auth(Request $request){
        $this->validate($request,[
         'email' => 'required',
         'password' => 'required',
        ]);
        if(auth()->attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect()->route('cars.index');
        }else{
            return redirect()->route('users.login')->with(['error'=>'Email ou mot de passe est incorrect']);
        }
    }

    public function create(){
        return view('users.registre');
    }
    public function registre(Request $request){

        $this->validate($request, [
          'email' => 'required',
          'password' => 'required',
          'name' => 'required',
          'tel' => 'required',
          'ville' => 'required',
        ]);
        User::create([
            'name' =>$request->name,
            'email' =>$request->email,
            'password' =>Hash::make($request->password),
            'tel' =>$request->tel,
            'ville' =>$request->ville,
        ]);
        return redirect()->route('users.login')->with(['success'=>'registre is successfully !']);

    }
    public function logout(){
        auth()->logout();
        return redirect()->route('cars.index');
    }
}
