@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Crear Nueva Reserva</h1>
</div>
<hr>
<div class="row"> 
    <div class="col-md-12"> 
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Complete los Datos de la Reserva</h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/reservas/create') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-4"> 
                            <div class="form-group">
                                <label for="cancha_id">Cancha </label> <b>*</b>
                                <select name="cancha_id" class="form-control @error('cancha_id') is-invalid @enderror" required>
                                    <option value="">Seleccione una cancha</option>
                                    @foreach($canchas as $cancha)
                                        <option value="{{ $cancha->id }}" {{ old('cancha_id') == $cancha->id ? 'selected' : '' }}>
                                            {{ $cancha->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('cancha_id')
                                    <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Usuario oculto: no es necesario que el admin lo seleccione -->
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                        <div class="col-md-4"> 
                            <div class="form-group">
                                <label for="fecha">Fecha de la Reserva </label> <b>*</b>
                                <input type="date" value="{{ old('fecha') }}" name="fecha" class="form-control @error('fecha') is-invalid @enderror" required>
                                @error('fecha')
                                    <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4"> 
                            <div class="form-group">
                                <label for="hora_inicio">Hora de Inicio </label> <b>*</b>
                                <input type="time" value="{{ old('hora_inicio') }}" name="hora_inicio" class="form-control @error('hora_inicio') is-invalid @enderror" required>
                                @error('hora_inicio')
                                    <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4"> 
                            <div class="form-group">
                                <label for="hora_fin">Hora de Fin </label> <b>*</b>
                                <input type="time" value="{{ old('hora_fin') }}" name="hora_fin" class="form-control @error('hora_fin') is-invalid @enderror" required>
                                @error('hora_fin')
                                    <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4"> 
                            <div class="form-group">
                                <label for="motivo">Motivo de la Reserva </label>
                                <textarea name="motivo" class="form-control @error('motivo') is-invalid @enderror">{{ old('motivo') }}</textarea>
                                @error('motivo')
                                    <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"> 
                            <a href="{{ url('admin/reservas') }}" class="btn btn-secondary">Retroceder</a>
                            <button type="submit" class="btn btn-primary">Registrar Reserva</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
