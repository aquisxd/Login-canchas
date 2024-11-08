@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Detalles de la Cancha</h1>
</div>
<hr>
<div class="row"> 
    <div class="col-md-12"> 
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ $cancha->nombre }}</h3>
            </div>
            <div class="card-body">
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
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Foto de la Cancha:</label><br>
                            @if($cancha->foto)
                                <img src="{{ asset('storage/' . $cancha->foto) }}" alt="Foto de la cancha" style="max-width: 100%; height: auto;">
                            @else
                                <p>No hay foto disponible.</p>
                            @endif
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                   
                    <div class="col-md-4"> 
                        <a href="{{ url('admin/canchas') }}" class="btn btn-secondary">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection