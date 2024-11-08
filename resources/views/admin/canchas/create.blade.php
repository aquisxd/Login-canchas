
@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Registro de una nueva Cancha</h1>
</div>
<hr>
<div class="row"> 
    <div class="col-md-12"> 
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Complete los Datos</h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/canchas/create') }}" method="POST" enctype="multipart/form-data"> <!-- Agregado enctype para subir archivos -->
                    @csrf
                    <div class="row">
                        <div class="col-md-4"> 
                            <div class="form-group">
                                <label for="">Nombre </label> <b>*</b>
                                <input type="text" value="{{ old('nombre') }}" name="nombre" class="form-control" required>
                                @error('nombre')
                                    <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4"> 
                            <div class="form-group">
                                <label for="">Ubicación </label> <b>*</b>
                                <input type="text" value="{{ old('ubicacion') }}" name="ubicacion" class="form-control" required>
                                @error('ubicacion')
                                    <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4"> 
                            <div class="form-group">
                                <label for="">Capacidad </label> <b>*</b>
                                <input type="text" value="{{ old('capacidad') }}" name="capacidad" class="form-control" required>
                                @error('capacidad')
                                    <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4"> 
                            <div class="form-group">
                                <label for="">Teléfono </label>
                                <input type="text" value="{{ old('telefono') }}" name="telefono" class="form-control">
                                @error('telefono')
                                    <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4"> 
                            <div class="form-group">
                                <label for="">Tipo </label>
                                <input type="text" value="{{ old('tipo') }}" name="tipo" class="form-control">
                                @error('tipo')
                                    <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4"> 
                            <div class="form-group">
                                <label for="">Estado </label>
                                <input type="text" value="{{ old('estado') }}" name="estado" class="form-control">
                                @error('estado')
                                    <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4"> 
                            <div class="form-group">
                                <label for="">Foto de la Cancha</label>
                                <input type="file" name="foto" class="form-control" accept="image/*"> <!-- Campo para subir la foto -->
                                @error('foto')
                                    <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"> 
                            <a href="{{ url('admin/canchas') }}" class="btn btn-secondary">Retroceder</a>
                            <button type="submit" class="btn btn-primary">Registrar Cancha</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection