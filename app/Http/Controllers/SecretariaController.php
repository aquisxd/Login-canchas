<?php

namespace App\Http\Controllers;

use App\Models\Secretaria;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SecretariaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {  
        $secretarias = secretaria::with('user')->get();
        return view('admin.secretarias.index',compact('secretarias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.secretarias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'dni' => 'required|unique:secretarias',
            'celular' => 'required',
            'direccion' => 'required',
            'email' => 'required|max:250|unique:users', // Cambiado a 'users'
            'password' => 'required|max:250|confirmed',
        ]);
    
        // Crear el usuario
        $usuario = new User();
        $usuario->name = $request->nombres; // Cambiado de 'nombre' a 'nombres'
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password); // Asegúrate de encriptar la contraseña
        $usuario->save(); // Guardar el usuario
    
        // Crear la secretaria
        $secretaria = new Secretaria();
        $secretaria->user_id = $usuario->id; // Asociar la secretaria al usuario
        $secretaria->nombres = $request->nombres;
        $secretaria->apellidos = $request->apellidos;
        $secretaria->dni = $request->dni; // Asegúrate de asignar este campo
        $secretaria->celular = $request->celular;
        $secretaria->fecha_nacimiento = $request->fecha_nacimiento; // Asegúrate de que este campo exista
        $secretaria->direccion = $request->direccion;
        $secretaria->save(); // Guardar la secretaria

        
    
        return redirect()->route('admin.secretarias.index')
            ->with('mensaje', 'Secretaria creada exitosamente.')
            ->with('icono', 'success');
    }
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
       
        $secretaria = Secretaria::with('user')->findOrFail($id);
        return view('admin.secretarias.show',compact('secretaria'));
    }   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $secretaria = Secretaria::with('user')->findOrFail($id);
        return view('admin.secretarias.edit',compact('secretaria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $secretaria = Secretaria::find($id);

        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'dni' => 'required|unique:secretarias,dni,' . $secretaria->id,
            'celular' => 'required',
            'direccion' => 'required',
            'email' => 'required|max:250|unique:users,email,' . $secretaria->user->id, // Cambiado a 'users'
            'password' => 'nullable|max:250|confirmed',
        ]);

      
        $secretaria->nombres = $request->nombres;
        $secretaria->apellidos = $request->apellidos;
        $secretaria->dni = $request->dni; // Asegúrate de asignar este campo
        $secretaria->celular = $request->celular;
        $secretaria->fecha_nacimiento = $request->fecha_nacimiento; // Asegúrate de que este campo exista
        $secretaria->direccion = $request->direccion;
        $secretaria->save();
         // Guardar la secretaria

         $usuario = User::find($secretaria->user->id);
         $usuario->name = $request->nombres;
         $usuario->email = $request->email;
         if($request->filled(key:'password')){

                      $usuario->password = Hash::make($request['password']); // Asegúrate de encriptar la contraseña
        }
        $usuario->save();

        return redirect()->route('admin.secretarias.index')
        ->with('mensaje', 'Se actualizo a la Secretaria exitosamente.')
        ->with('icono', 'success');
        

        
    }

    public function confirmDelete($id){
        $secretaria = Secretaria::with('user')->findOrFail($id);
        return view('admin.secretarias.delete', compact('secretaria'));
        
       }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    $secretaria = Secretaria::find($id);

    $user = $secretaria->user;
    $user->delete();

    $secretaria->delete();
    

    return redirect()->route(route:'admin.secretarias.index')
        ->with('mensaje', 'Se elimino el registro exitosamente.')
        ->with('icono', 'success');
    }
}
