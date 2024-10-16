
@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Modificar Secretaria: {{$secretaria->nombres}}  {{$secretaria->apellidos}}</h1>
</div>
<hr>
<div class="row"> 
    <div class="col-md-12"> 
        <div class="card card-outline card-success">
            <div class="card-header">
                <h3 class="card-title">Complete los Datos</h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/secretarias',$secretaria->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-3"> 
                            <div class="form-group">
                                <label for="">Nombres </label> <b>*</b>
                                <input type="text" value="{{ $secretaria->nombres }}" name="nombres" class="form-control" required>
                                @error('nombres')
                                    <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3"> 
                            <div class="form-group">
                                <label for="">Apellidos </label> <b>*</b>
                                <input type="text" value="{{ $secretaria->apellidos }}" name="apellidos" class="form-control" required>
                                @error('apellidos')
                                    <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3"> 
                            <div class="form-group">
                                <label for="">DNI </label> <b>*</b>
                                <input type="text" value="{{ $secretaria->dni }}" name="dni" class="form-control" required>
                                @error('dni')
                                    <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3"> 
                            <div class="form-group">
                                <label for="">Celular </label> <b>*</b>
                                <input type="text" value="{{ $secretaria->celular }}" name="celular" class="form-control" required>
                                @error('celular')
                                    <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4"> 
                            <div class="form-group">
                                <label for="">Fecha de nacimiento </label> <b>*</b>
                                <input type="date" value="{{ $secretaria->fecha_nacimiento }}" name="fecha_nacimiento" class="form-control" required>
                                @error('fecha_nacimiento')
                                    <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-8"> 
                            <div class="form-group">
                                <label for="">Dirección </label> <b>*</b>
                                <input type="text" value="{{ $secretaria->direccion }}" name="direccion" class="form-control" required>
                                @error('direccion')
                                    <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4"> 
                            <div class="form-group">
                                <label for="">Email </label> <b>*</b>
                                <input type="email" value="{{ $secretaria->user->email }}" name="email" class="form-control" required>
                                @error('email')
                                    <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4"> 
                            <div class="form-group">
                                <label for="">Contraseña </label> 
                                <input type="password" value="{{ old('password') }}" name="password" class="form-control">
                                @error('password')
                                    <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4"> 
                            <div class="form-group">
                                <label for="">Confirmar Contraseña </label> 
                                <input type="password" name="password_confirmation" class="form-control">
                                @error('password_confirmation')
                                    <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"> 
                            <a href="{{ url('admin/secretarias') }}" class="btn btn-secondary">Retroceder</a>
                            <button type="submit" class="btn btn-success">Actualizar Registro</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
