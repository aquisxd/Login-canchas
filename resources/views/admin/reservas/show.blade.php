@extends('layouts.admin')

@section('content')
<!-- Google Font: Source Sans Pro -->
<div class="container mt-4">
    <div class="row mb-3">
        <div class="col">
            <h1 class="text-center">Detalles de la Reserva</h1>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Información de la Reserva</h3>
                    <div class="card-tools">
                        <a href="{{ url('admin/reservas') }}" class="btn btn-secondary">
                            Volver a la lista
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Cancha</label>
                                <input type="text" class="form-control" value="{{ $reserva->cancha->nombre }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Usuario</label>
                                <input type="text" class="form-control" value="{{ $reserva->user->name }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Fecha</label>
                                <input type="text" class="form-control" value="{{ \Carbon\Carbon::parse($reserva->fecha)->format('d/m/Y') }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Hora Inicio</label>
                                <input type="text" class="form-control" value="{{ $reserva->hora_inicio }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Hora Fin</label>
                                <input type="text" class="form-control" value="{{ $reserva->hora_fin }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Motivo</label>
                                <input type="text" class="form-control" value="{{ $reserva->motivo ?? 'No disponible' }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Estado</label>
                                <input type="text" class="form-control" value="{{ $reserva->estado }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="btn-group" role="group">
                        <a href="{{ url('/admin/reservas/' . $reserva->id . '/edit') }}" class="btn btn-success"><i class="bi bi-pencil"></i> Editar</a>
                        <a href="{{ url('/admin/reservas/' . $reserva->id . '/confirm-delete') }}" class="btn btn-danger"><i class="bi bi-trash"></i> Eliminar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
