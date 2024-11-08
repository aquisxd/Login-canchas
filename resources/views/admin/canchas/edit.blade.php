@extends('layouts.admin')

@section('content')
<div class="row">
    <h1>Modificar Cancha: {{$cancha->nombre}}</h1>
</div>
<hr>
<div class="row"> 
    <div class="col-md-12"> 
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Actualice los Datos de la Cancha</h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/canchas', $cancha->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Método PUT para actualizar -->
                    
                    <!-- Mostrar mensajes de estado si existe -->
                    @if(session('mensaje'))
                        <div class="alert alert-{{ session('icono') }}">
                            {{ session('mensaje') }}
                        </div>
                    @endif
                    
                    <div class="row">
                        <div class="col-md-4"> 
                            <div class="form-group">
                                <label for="">Nombre</label> <b>*</b>
                                <input type="text" value="{{ old('nombre', $cancha->nombre) }}" name="nombre" class="form-control @error('nombre') is-invalid @enderror" required>
                                @error('nombre')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4"> 
                            <div class="form-group">
                                <label for="">Ubicación</label> <b>*</b>
                                <input type="text" value="{{ old('ubicacion', $cancha->ubicacion) }}" name="ubicacion" class="form-control @error('ubicacion') is-invalid @enderror" required>
                                @error('ubicacion')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4"> 
                            <div class="form-group">
                                <label for="">Capacidad</label> <b>*</b>
                                <input type="text" value="{{ old('capacidad', $cancha->capacidad) }}" name="capacidad" class="form-control @error('capacidad') is-invalid @enderror" required>
                                @error('capacidad')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-md-4"> 
                            <div class="form-group">
                                <label for="">Teléfono</label>
                                <input type="text" value="{{ old('telefono', $cancha->telefono) }}" name="telefono" class="form-control @error('telefono') is-invalid @enderror">
                                @error('telefono')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4"> 
                            <div class="form-group">
                                <label for="">Tipo</label>
                                <input type="text" value="{{ old('tipo', $cancha->tipo) }}" name="tipo" class="form-control @error('tipo') is-invalid @enderror">
                                @error('tipo')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4"> 
                            <div class="form-group">
                                <label for="">Estado</label>
                                <input type="text" value="{{ old('estado', $cancha->estado) }}" name="estado" class="form-control @error('estado') is-invalid @enderror">
                                @error('estado')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-md-4"> 
                            <div class="form-group">
                                <label for="">Foto de la Cancha</label>
                                <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/*"> <!-- Campo para subir la foto -->
                                @error('foto')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-8"> 
                            <div class="form-group">
                                <label>Foto Actual</label><br>
                                @if($cancha->foto)
                                    <img src="{{ asset('storage/' . $cancha->foto) }}" alt="Foto de la cancha" class="img-fluid" style="max-width: 100%; height: auto;">
                                @else
                                    <p>No hay foto disponible.</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-4"> 
                            <a href="{{ url('admin/canchas') }}" class="btn btn-secondary">Retroceder</a>
                            <button type="submit" class="btn btn-primary">Actualizar Cancha</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
