@extends('layouts.admin')

@section('content')
<!-- Google Font: Source Sans Pro -->
<div class="container mt-4">
    <div class="row mb-3">
        <div class="col">
            <h1 class="text-center">Editar Reserva</h1>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Modificar Información de la Reserva</h3>
                    <div class="card-tools">
                        <a href="{{ url('admin/reservas') }}" class="btn btn-secondary">
                            Volver a la lista
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/reservas/' . $reserva->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cancha">Cancha</label>
                                    <select name="cancha_id" id="cancha" class="form-control" required>
                                        <option value="">Seleccionar Cancha</option>
                                        @foreach ($canchas as $cancha)
                                            <option value="{{ $cancha->id }}" {{ $cancha->id == $reserva->cancha_id ? 'selected' : '' }}>
                                                {{ $cancha->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('cancha_id')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="usuario">Usuario</label>
                                    <input type="text" class="form-control" value="{{ $reserva->user->name }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fecha">Fecha</label>
                                    <input type="date" name="fecha" class="form-control" value="{{ \Carbon\Carbon::parse($reserva->fecha)->format('Y-m-d') }}" required>
                                    @error('fecha')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="hora_inicio">Hora de Inicio</label>
                                    <input type="time" name="hora_inicio" class="form-control" value="{{ $reserva->hora_inicio }}" required>
                                    @error('hora_inicio')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="hora_fin">Hora de Fin</label>
                                    <input type="time" name="hora_fin" class="form-control" value="{{ $reserva->hora_fin }}" required>
                                    @error('hora_fin')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="motivo">Motivo</label>
                                    <input type="text" name="motivo" class="form-control" value="{{ $reserva->motivo }}">
                                    @error('motivo')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="estado">Estado</label>
                                    <select name="estado" id="estado" class="form-control" required>
                                        <option value="pendiente" {{ $reserva->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                        <option value="confirmada" {{ $reserva->estado == 'confirmada' ? 'selected' : '' }}>Confirmada</option>
                                        <option value="cancelada" {{ $reserva->estado == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
                                    </select>
                                    @error('estado')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-4">
                                <a href="{{ url('admin/reservas') }}" class="btn btn-secondary">Volver</a>
                                <button type="submit" class="btn btn-primary">Actualizar Reserva</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
