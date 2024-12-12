<?php

namespace App\Http\Controllers;

use App\Mail\ReservacionEmail;
use App\Models\Cancha;
use App\Models\User; // Cambiado Cliente a User
use App\Models\Reserva;
use Illuminate\Http\Request;
use Carbon\Carbon;

use Illuminate\Support\Facades\Mail;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todas las reservas con los datos relacionados de usuario y cancha
        $reservas = Reserva::with(['user', 'cancha'])->get();
    
        return view('admin.reservas.index', compact('reservas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener todas las canchas y usuarios para llenar los campos del formulario
        $canchas = Cancha::all();
        $users = User::all();

        return view('admin.reservas.create', compact('canchas', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cancha_id' => 'required|exists:canchas,id',
            'user_id' => 'required|exists:users,id',
            'fecha' => 'required|date|after_or_equal:now',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i',
            'motivo' => 'nullable|string|max:255',
        ]);
    
        // Verificar si ya hay una reserva para esa cancha en ese horario
        $hora_inicio = Carbon::parse($request->hora_inicio);
        $hora_fin = Carbon::parse($request->hora_fin);
        
        if ($hora_fin <= $hora_inicio) {
            return back()->withErrors(['hora_fin' => 'La hora de fin debe ser mayor a la hora de inicio.']);
        }

        $existeReserva = Reserva::where('cancha_id', $request->cancha_id)
            ->where('fecha', $request->fecha)
            ->where(function ($query) use ($hora_inicio, $hora_fin) {
                $query->whereBetween('hora_inicio', [$hora_inicio, $hora_fin])
                      ->orWhereBetween('hora_fin', [$hora_inicio, $hora_fin]);
            })
            ->exists();
    
        if ($existeReserva) {
            return back()->withErrors(['fecha' => 'La cancha ya está reservada en ese horario.']);
        }
         
        // Crear la reserva
        $reserva = new Reserva();
        $reserva->user_id = $request->user_id;
        $reserva->cancha_id = $request->cancha_id;
        $reserva->fecha = $request->fecha;
        $reserva->hora_inicio = $hora_inicio;
        $reserva->hora_fin = $hora_fin;
        $reserva->motivo = $request->motivo;
        $reserva->save();
    
        return redirect()->route('admin.reservas.index')->with('success', 'Reserva realizada con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $reserva = Reserva::findOrFail($id);
        return view('admin.reservas.show', compact('reserva'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $reserva = Reserva::findOrFail($id);
        $canchas = Cancha::all();
        $users = User::all();
        return view('admin.reservas.edit', compact('reserva', 'canchas', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $reserva = Reserva::findOrFail($id);

        $request->validate([
            'cancha_id' => 'required|exists:canchas,id',
            'user_id' => 'required|exists:users,id',
            'fecha' => 'required|date|after_or_equal:now',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i',
            'motivo' => 'nullable|string|max:255',
        ]);

        // Verificar si la cancha ya está reservada en ese horario
        $hora_inicio = Carbon::parse($request->hora_inicio);
        $hora_fin = Carbon::parse($request->hora_fin);
        
        if ($hora_fin <= $hora_inicio) {
            return back()->withErrors(['hora_fin' => 'La hora de fin debe ser mayor a la hora de inicio.']);
        }

        $existeReserva = Reserva::where('cancha_id', $request->cancha_id)
            ->where('fecha', $request->fecha)
            ->where(function ($query) use ($hora_inicio, $hora_fin, $reserva) {
                $query->whereBetween('hora_inicio', [$hora_inicio, $hora_fin])
                      ->orWhereBetween('hora_fin', [$hora_inicio, $hora_fin])
                      ->where('id', '!=', $reserva->id);
            })
            ->exists();

        if ($existeReserva) {
            return back()->withErrors(['fecha' => 'La cancha ya está reservada en ese horario.']);
        }

        // Actualizar los datos de la reserva
        $reserva->user_id = $request->user_id;
        $reserva->cancha_id = $request->cancha_id;
        $reserva->fecha = $request->fecha;
        $reserva->hora_inicio = $hora_inicio;
        $reserva->hora_fin = $hora_fin;
        $reserva->motivo = $request->motivo;
        $reserva->save();

        return redirect()->route('admin.reservas.index')->with('success', 'Reserva actualizada con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function confirmDelete($id)
    {
        $reserva = Reserva::with('user', 'cancha')->findOrFail($id);
        return view('admin.reservas.delete', compact('reserva'));
    }

    public function destroy($id)
    {
        $reserva = Reserva::findOrFail($id);
        $reserva->delete();

        return redirect()->route('admin.reservas.index')->with('success', 'Reserva eliminada con éxito.');
    }

    public function enviarNotificacion($reserva)
    {
        $email = new ReservacionEmail($reserva);
        Mail::to(["mchoque@coboser.com", "casiprogramador@gmail.com"])->send($email);

        if (Mail::failures()) {
            return false;
        }

        return true;
    }

   
}
