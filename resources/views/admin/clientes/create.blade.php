
@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Registro de un nuevo Cliente</h1>
</div>
<hr>
<div class="row"> 
    <div class="col-md-12"> 
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Complete los Datos</h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/clientes/create') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-3"> 
                            <div class="form-group">
                                <label for="">Nombres </label> <b>*</b>
                                <input type="text" value="{{ old('nombres') }}" name="nombres" class="form-control" required>
                                @error('nombres')
                                    <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3"> 
                            <div class="form-group">
                                <label for="">Apellidos </label> <b>*</b>
                                <input type="text" value="{{ old('apellidos') }}" name="apellidos" class="form-control" required>
                                @error('apellidos')
                                    <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3"> 
                            <div class="form-group">
                                <label for="">DNI </label> <b>*</b>
                                <input type="text" value="{{ old('dni') }}" name="dni" class="form-control" required>
                                @error('dni')
                                    <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3"> 
                            <div class="form-group">
                                <label for="">Fecha de nacimiento </label> <b>*</b>
                                <input type="date" value="{{ old('fecha_nacimiento') }}" name="fecha_nacimiento" class="form-control" required>
                                @error('fecha_nacimiento')
                                    <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4"> 
                            <div class="form-group">
                                <label for="">Género </label>
                                <select name="genero" id="" class="form-control">

                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                            </select>
                                
                            </div>
                        </div>
                        <div class="col-md-4"> 
                            <div class="form-group">
                                <label for="">Celular </label> <b>*</b>
                                <input type="text" value="{{ old('celular') }}" name="celular" class="form-control" required>
                                @error('celular')
                                    <small style="color:red">{{ $message }}</small>
                                @enderror
                                
                            </div>
                        </div>
                        <div class="col-md-4"> 
                            <div class="form-group">
                                <label for="">Dirección </label> <b>*</b>
                                <input type="text" value="{{ old('direccion') }}" name="direccion" class="form-control" required>
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
                                <label for="">Correo </label> <b>*</b>
                                <input type="correo" value="{{ old('correo') }}" name="correo" class="form-control" required>
                                @error('correo')
                                    <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4"> 
                            <div class="form-group">
                                <label for="">Contraseña </label> <b>*</b>
                                <input type="password" value="{{ old('password') }}" name="password" class="form-control" required>
                                @error('password')
                                    <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4"> 
                            <div class="form-group">
                                <label for="">Confirmar Contraseña </label> <b>*</b>
                                <input type="password" name="password_confirmation" class="form-control" required>
                                @error('password_confirmation')
                                    <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"> 
                            <a href="{{ url('admin/clientes') }}" class="btn btn-secondary">Retroceder</a>
                            <button type="submit" class="btn btn-primary">Registrar  cliente</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
