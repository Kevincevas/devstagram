<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function index() 
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // acceder a todos los valores
        // dd($request);

        // acceder a los valores de manera individual
        // dd($request->get('name'));

        // Modificar el Request (evitar la pantalla de error por username duplicado)
        $request->request->add(['username' => Str::slug($request->username)]);

        // Validación
        $this->validate($request, [
            'name' => 'required|max:30',
            'username' => 'required|unique:users|min:3|max:20',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username, //lower: guardar el campo en minusculas. slug: elimina aceptos, pone todo en minusculas y separado por guiones, permite tener datos duplicados
            'email' => $request->email,
            // 'password' => $request->password, //al parecer ya hashea automaticamente sin la funcion
            'password' => Hash::make($request->password),

        ]);

        // Autenticar un usuarios
        // auth()->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password,
        // ]);

        // Otra forma de autenticar
            auth()->attempt($request->only('email','password')); 


        // Redireccionar
        return redirect()->route('post.index', auth()->user());

    }

    public function destroy()
    {
        dd('Destroy...');
    }
}
