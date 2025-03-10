<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //Aqui crear toda la lógica del crud

    public function loadSignUp(){
        
        return view('signup');
    }

    public function loadLogin(){
        
        return view('login');
    }

    public function ComprobarUserRegistro(Request $request){
        $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:4|max:8',
        ]);

        try {
            // register user here
            $new_user = new User;
            $new_user->name = $request->full_name;
            $new_user->email = $request->email;
            $new_user->password = Hash::make($request->password);
            $new_user->save();
    
            return redirect('/login')->with("success","Usuario añadido con exito");
            
        } catch (\Exception $e) {
            return redirect('/')->with("fail",$e->getMessage());
        }

       

    }

    public function ComprobarUserInicio(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4|max:8',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Si las credenciales son correctas
            return redirect('/index'); // Redirigir a la página que desees
        } else {
            // Si las credenciales son incorrectas
            return back()->with( 'error' , 'Las credenciales no son correctas.')->withInput();
        }
       

       

    }
   
}
