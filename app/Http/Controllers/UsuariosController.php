<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsuariosController extends Controller
{
    public function index() {
        $usuarios = User::orderBy("name")->get();
        return view("gestion.usuarios.principal",
                        ["usuarios" => $usuarios]);
    }

    public function editar($id) {
        $usuario = (object) ["id" => 0, "name" => "", "email" => "", "password" => ""];
        if ($id > 0)    {
            $usuario = User::find($id);
        }
        return view("gestion.usuarios.editar",
                        ["usuario" => $usuario]);
    }

    public function guardar(Request $request)    {
        $validador = Validator::make($request->all(),
                    [
                        "email" => "required|email",
                        "name" => "required|string"
                    ]);
        if ($validador->fails())    {
            $usuario = (object) ["id" => $request->id, "name" => $request->name, "email" => $request->email, "password" => ""];
            $request->session()->flash('error', 'Datos incorrectos');
            return view("gestion.usuarios.editar", ["usuario" => $usuario]);
        }

        $usuario = new User();
        if ($request->id > 0)   {
            $usuario = User::find($request->id);
        }
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = Hash::make("123");
        $usuario->save();
        return redirect("/gestion/usuarios");
    }

    public function eliminar(Request $request)  {
        $usuario = User::find($request->id);
        $usuario->delete();
        return redirect("/gestion/usuarios");
    }


}
