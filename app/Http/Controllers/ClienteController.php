<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('admin.clientes.index',compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.clientes.create');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'dni' => 'required|unique:clientes', // Cambiado a 'clientes'
            'celular' => 'required',
            'direccion' => 'required',
            'correo' => 'required', // Cambiado a 'users' y asegurando que sea un email válido
            'password' => 'required|max:250|confirmed',
            'fecha_nacimiento' => 'required|date', // Asegúrate de incluir la fecha de nacimiento
            'genero' => 'required',
        ]);
    
       
    
        // Crear el cliente
        $cliente = new Cliente();
        $cliente->id; // Asociar el cliente al usuario
        $cliente->nombres = $request->nombres;
        $cliente->apellidos = $request->apellidos;
        $cliente->dni = $request->dni; // Asegúrate de asignar este campo
      
        $cliente->fecha_nacimiento = $request->fecha_nacimiento; 
        $cliente->genero = $request->genero; // Asegúrate de incluir el género
        $cliente->celular = $request->celular;// Asegúrate de que este campo exista
        $cliente->direccion = $request->direccion;
        $cliente->correo = $request->correo;
       
        $cliente->save(); // Guardar el cliente
    
        return redirect()->route('admin.clientes.index')
            ->with('mensaje', 'Cliente creado exitosamente.')
            ->with('icono', 'success');
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cliente = Cliente::find($id);
        return view('admin.clientes.show',compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id);
        return view('admin.clientes.edit',compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);
    
        if (!$cliente) {
            return redirect()->route('admin.clientes.index')
                ->with('mensaje', 'Cliente no encontrado.')
                ->with('icono', 'error');
        }
    
        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'dni' => 'required|unique:clientes,dni,' . $cliente->id, // Cambié 'secretarias' a 'clientes'
            'fecha_nacimiento' => 'required|date', // Corregido el nombre del campo
            'genero' => 'required',
            'celular' => 'required',
            'direccion' => 'required',
            'correo' => 'required|max:250|unique:clientes,correo,' . $cliente->id, // Cambiado a 'clientes'
            'password' => 'nullable|max:250|confirmed',
        ]);
    
        // Asignar valores al cliente
        $cliente->nombres = $request->nombres;
        $cliente->apellidos = $request->apellidos;
        $cliente->dni = $request->dni;
        $cliente->fecha_nacimiento = $request->fecha_nacimiento; 
        $cliente->genero = $request->genero;
        $cliente->celular = $request->celular;
        $cliente->direccion = $request->direccion;
        $cliente->correo = $request->correo;
    
        // Si se proporciona una nueva contraseña, se debe actualizar
        if ($request->filled('password')) {
            $cliente->password = bcrypt($request->password);
        }
    
        $cliente->save();
    
        return redirect()->route('admin.clientes.index')
            ->with('mensaje', 'Se actualizó al cliente exitosamente.')
            ->with('icono', 'success');
    }

    public function confirmDelete($id){
        $cliente = Cliente::with('user')->findOrFail($id);
        return view('admin.clientes.delete', compact('cliente'));
        
       }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id);

 

    $cliente->delete();
    

    return redirect()->route(route:'admin.clientes.index')
        ->with('mensaje', 'Se elimino el registro exitosamente.')
        ->with('icono', 'success');
    }
}
