
@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Eliminar Cliente: {{$cliente->nombres}}  {{$cliente->apellidos}}</h1>
</div>
<hr>
<div class="row"> 
    <div class="col-md-12"> 
        <div class="card  card-danger">
            <div class="card-header">
                <h3 class="card-title">¿Estas seguro de eliminar este registro?</h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/clientes',$cliente->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="row">
                        <div class="col-md-3"> 
                            <div class="form-group">
                                <label for="">Nombres </label> 
                                <input type="text" value="{{ $cliente->nombres }}" name="nombres" class="form-control" disabled>
                                @error('nombres')
                                    <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3"> 
                            <div class="form-group">
                                <label for="">Apellidos </label> 
                                <input type="text" value="{{ $cliente->apellidos }}" name="apellidos" class="form-control" disabled>
                                @error('apellidos')
                                    <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3"> 
                            <div class="form-group">
                                <label for="">DNI </label> 
                                <input type="text" value="{{ $cliente->dni }}" name="dni" class="form-control" disabled>
                                @error('dni')
                                    <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3"> 
                            <div class="form-group">

                                <label for="">Fecha de nacimiento </label> 
                                <input type="date" value="{{ $cliente->fecha_nacimiento }}" name="fecha_nacimiento" class="form-control" disabled>
                                @error('fecha_nacimiento')
                                    <small style="color:red">{{ $message }}</small>
                                @enderror
                               
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3"> 
                            <div class="form-group">
                                <label for="">Genero </label> 
                                <input type="text" value="{{ $cliente->genero }}" name="genero" class="form-control" disabled>
                                @error('genero')
                                    <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3"> 
                            <div class="form-group">
                                <label for="">Celular </label> 
                                <input type="text" value="{{ $cliente->celular }}" name="celular" class="form-control" disabled>
                                @error('celular')
                                    <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3"> 
                            <div class="form-group">
                                <label for="">Dirección </label> 
                                <input type="text" value="{{ $cliente->direccion }}" name="direccion" class="form-control" disabled>
                                @error('direccion')
                                    <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3"> 
                            <div class="form-group">
                                <label for="">Correo </label> 
                                <input type="email" value="{{ $cliente->correo }}" name="correo" class="form-control" disabled>
                                @error('correo')
                                    <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                       
                        
                     
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"> 
                            <a href="{{ url('admin/clientes') }}" class="btn btn-secondary">Retroceder</a>
                            <button type="submit" class="btn btn-danger">Eliminar Registro</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
