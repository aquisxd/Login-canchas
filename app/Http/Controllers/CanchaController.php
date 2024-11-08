<?php

namespace App\Http\Controllers;

use App\Models\Cancha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CanchaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $canchas = Cancha::all();
        return view('admin.canchas.index',compact('canchas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.canchas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'capacidad' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'tipo' => 'nullable|string|max:255',
            'estado' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Validaciones para la foto
        ]);
    
       
    
        // Crear el cancha
        $cancha = new Cancha();
        $cancha->nombre = $request->nombre;
        $cancha->ubicacion = $request->ubicacion;
        $cancha->capacidad = $request->capacidad;
        $cancha->telefono = $request->telefono;
        $cancha->tipo = $request->tipo;
        $cancha->estado = $request->estado;

    if ($request->hasFile('foto')) {
        $path = $request->file('foto')->store('fotos', 'public'); // Guarda la foto en el directorio 'storage/app/public/fotos'
        $cancha->foto = $path; // Almacena la ruta en la base de datos
    }

    $cancha->save();


    return redirect()->route('admin.canchas.index')->with('success', 'Cancha creada exitosamente.');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $cancha = Cancha::find($id);
    return view('admin.canchas.show', compact('cancha'));
}

/**
 * Show the form for editing the specified resource.
 */
public function edit($id)
{
    $cancha = Cancha::find($id);
    return view('admin.canchas.edit', compact('cancha')); // Cambié 'show' a 'edit'
}

/**
 * Update the specified resource in storage.
 */
public function update(Request $request, $id)
{
    // Intentar encontrar la cancha por su ID
    $cancha = Cancha::find($id);
    
    // Verificar si la cancha existe. Si no, redirigir con un mensaje de error.
    if (!$cancha) {
        return redirect()->route('admin.canchas.index')
            ->with('mensaje', 'Cancha no encontrada.')
            ->with('icono', 'error');
    }
    
    // Validación de los datos del formulario
    $request->validate([
        'nombre' => 'required|string|max:255',
        'ubicacion' => 'required|string|max:255',
        'capacidad' => 'required|string|max:255',
        'telefono' => 'nullable|string|max:20',
        'tipo' => 'nullable|string|max:255',
        'estado' => 'nullable|string|max:255',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Validación para la foto
    ]);

    // Asignar los valores actualizados a la cancha
    $cancha->nombre = $request->nombre;
    $cancha->ubicacion = $request->ubicacion;
    $cancha->capacidad = $request->capacidad;
    $cancha->telefono = $request->telefono;
    $cancha->tipo = $request->tipo;
    $cancha->estado = $request->estado;

    // Si se proporciona una nueva foto, actualizarla
    if ($request->hasFile('foto')) {
        // Eliminar la foto anterior si existe
        if ($cancha->foto) {
            Storage::disk('public')->delete($cancha->foto);
        }
        // Almacenar la nueva foto
        $path = $request->file('foto')->store('fotos', 'public');
        $cancha->foto = $path; // Almacenar la nueva ruta de la foto en la base de datos
    }

    // Guardar los cambios en la base de datos
    $cancha->save();

    // Redirigir con un mensaje de éxito
    return redirect()->route('admin.canchas.index')
        ->with('mensaje', 'Se actualizó la cancha exitosamente.')
        ->with('icono', 'success');
}



public function confirmDelete($id)
{
    $cancha = Cancha::find($id);
    return view('admin.canchas.delete', compact('cancha'));
}

/**
 * Remove the specified resource from storage.
 */
public function destroy($id)
{
    $cancha = Cancha::find($id);
    if ($cancha->foto) {
        Storage::disk('public')->delete($cancha->foto); // Eliminar la foto del almacenamiento
    }
    $cancha->delete();
    return redirect()->route('admin.canchas.index')
        ->with('mensaje', 'Se eliminó el registro exitosamente.')
        ->with('icono', 'success');
 }

}
