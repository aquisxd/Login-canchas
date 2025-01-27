<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index (){
        $usuarios = User:: all();
        return view('admin.usuarios.index', compact('usuarios'));
    }

    public function create (){
        return view('admin.usuarios.create');
    }

    public function store(Request $request) {
       // $datos = $request->all(); // Cambié request() por $request
        //return response()->json($datos); // Corrección de 'responce' a 'response'
        $request->validate([
            'name'=>'required|max:250',
            'email'=>'required|max:250|unique:users',
            'password'=>'required|max:250|confirmed',

        ]);
           // Crear un nuevo usuario
    $usuario = new User();
    $usuario->name = $request->name;
    $usuario->email = $request->email;
    $usuario->password = Hash::make($request->password); // Asegúrate de encriptar la contraseña
    $usuario->save(); // Guardar el usuario en la base de datos

    // Retornar una respuesta JSON o redirigir según lo necesites
   // return response()->json($usuario, 201); // Retorna el usuario creado
    return redirect()->route(route:'admin.usuarios.index')
    ->with('mensaje', 'Usuario creado exitosamente.')
    ->with('icono', 'success');
        


    }
    public function show($id){
        $usuario = User::findOrFail($id);
        return view('admin.usuarios.show', compact('usuario'));
        
    }

    public function edit($id){
        $usuario = User::findOrFail($id);
        return view('admin.usuarios.edit', compact('usuario'));

    }

    public function update(Request $request, $id){
        $usuario = User::find($id);

        $request->validate([
            'name'=>'required|max:250',
            'email'=>'required|max:250|unique:users,email,'.$usuario->id,
            'password'=>'nullable|max:250|confirmed',

        ]);
      
        $usuario->name = $request->name;
        $usuario->email = $request->email;

        if($request->filled(key:'password')){

                      $usuario->password = Hash::make($request['password']); // Asegúrate de encriptar la contraseña
        }
        $usuario->save();

        return redirect()->route(route:'admin.usuarios.index')
        ->with('mensaje', 'Se atualizo el usuario exitosamente.')
        ->with('icono', 'success');


    }

    public function confirmDelete($id){
    $usuario = User::findOrFail($id);
    return view('admin.usuarios.delete', compact('usuario'));
    
   }

   public function destroy($id){

    User::destroy($id);

    return redirect()->route(route:'admin.usuarios.index')
        ->with('mensaje', 'Se elimino el usuario exitosamente.')
        ->with('icono', 'success');

   }


}
 //Este es un capibara salvaje