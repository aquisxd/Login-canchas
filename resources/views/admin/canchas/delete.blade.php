@extends('layouts.admin')

@section('content')
<div class="row">
    <h1>Eliminar Cancha</h1>
</div>
<hr>
<div class="row"> 
    <div class="col-md-12"> 
        <div class="card card-outline card-danger">
            <div class="card-header">
                <h3 class="card-title">Confirmar Eliminación</h3>
            </div>
            <div class="card-body">
                <p>¿Estás seguro de que deseas eliminar la siguiente cancha?</p>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Nombre:</label>
                            <p>{{ $cancha->nombre }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Ubicación:</label>
                            <p>{{ $cancha->ubicacion }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Capacidad:</label>
                            <p>{{ $cancha->capacidad }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Teléfono:</label>
                            <p>{{ $cancha->telefono ?? 'No disponible' }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Tipo:</label>
                            <p>{{ $cancha->tipo ?? 'No disponible' }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Estado:</label>
                            <p>{{ $cancha->estado ?? 'No disponible' }}</p>
                        </div>
                    </div>
                </div>
                <!-- Nueva sección para mostrar la foto -->
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Foto de la cancha</label>
                            @if($cancha->foto) <!-- Verificamos si la cancha tiene foto -->
                                <img src="{{ Storage::url($cancha->foto) }}" alt="Foto de la cancha" class="img-fluid" style="max-width: 100%; height: auto;">
                            @else
                                <p>No hay foto disponible.</p>
                            @endif
                        </div>
                    </div>
                </div>
                <hr>
                <!-- Ajustar los botones para que estén más cerca -->
                <div class="row d-flex justify-content-start">
                    <!-- Botón Cancelar primero -->
                    <div class="mr-2"> 
                        <a href="{{ url('admin/canchas') }}" class="btn btn-secondary">Regresar</a>
                    </div>
                    <!-- Botón Eliminar después -->
                    <div> 
                        <form action="{{ url('admin/canchas/' . $cancha->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta cancha?')">Eliminar Cancha</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
