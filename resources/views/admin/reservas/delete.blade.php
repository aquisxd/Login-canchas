@extends('layouts.admin')

@section('content')
<!-- Google Font: Source Sans Pro -->
<div class="container mt-4">
    <div class="row mb-3">
        <div class="col">
            <h1 class="text-center">Confirmar Eliminación de la Reserva</h1>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-danger">
                <div class="card-header">
                    <h3 class="card-title">Eliminar Reserva</h3>
                    <div class="card-tools">
                        <a href="{{ url('admin/reservas') }}" class="btn btn-secondary">
                            Volver a la lista
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/reservas/' . $reserva->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <div class="row">
                            <div class="col-md-12">
                                <p>¿Está seguro de que desea eliminar la reserva de la cancha <strong>{{ $reserva->cancha->nombre }}</strong> realizada por el usuario <strong>{{ $reserva->user->name }}</strong>?</p>
                                <p><strong>Fecha:</strong> {{ \Carbon\Carbon::parse($reserva->fecha)->format('d-m-Y') }} <br>
                                <strong>Hora de inicio:</strong> {{ $reserva->hora_inicio }} <br>
                                <strong>Hora de fin:</strong> {{ $reserva->hora_fin }}</p>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-4">
                                <a href="{{ url('admin/reservas') }}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-danger">Eliminar Reserva</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
