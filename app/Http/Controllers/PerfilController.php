<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;


class PerfilController extends Controller
{

    public function __construct()
    {
        //Protege la ruta excepto el o los siguientes metodos
        $this->middleware('auth');
    }

    public function index()
    {
        return view('perfil.index');
    }

    public function store(Request $request)
    {
        // Modificar el request
        $request->request->add(['username' => Str::slug($request->username)]);

        $this->validate($request, [
            //en caso de que el propio usuario no quiera cambiar su username en editar-perfil
            'username' => ['required', 'unique:users,username,' .auth()->user()->id, 'min:3', 'max:20', 'not_in:twitter,editar-perfil'], //'in:cliente,proveedor'
            'name' => 'required|max:30',
            'email' => ['required', 'unique:users,email,' .auth()->user()->id, 'email', 'max:60'],
            'password' => 'min:6',
        ]);


        if ($request->imagen) {
            // $input = $request->all();
            $imagen = $request->file('imagen');

            $nombreImagen = Str::uuid() . "." . $imagen->extension();

            $imagenServidor = Image::make($imagen);
            $imagenServidor->fit(1000, 1000);

            $imagenPath = public_path('perfiles') . '/' . $nombreImagen;
            $imagenServidor->save($imagenPath);
        }

        // guardar cambios
        $usuario = User::find(auth()->user()->id);
        $usuario->name = $request->name;
        $usuario->username = $request->username;
        $usuario->email = $request->email;
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? null;
        
        //comparar contraseña ingresada con la hasheada del usuario
        if ( Hash::check($request->password, auth()->user()->password) ) {
            // hashear
            // $usuario->password = Hash::make($request->password) ?? auth()->user()->password;

            $usuario->save();

        } else {
            return back()->with('mensaje','La Contraseña ingresada no coincide');
        }

        // reescribir password
        // $usuario->password = Hash::make($request->password) ?? auth()->user()->imagen;
        

        // redireccionar
        return redirect()->route('post.index', $usuario->username);
    }
}
