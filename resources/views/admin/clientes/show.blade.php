
@extends('layouts.admin')
@section('content')
<div class="row">
    <h1>Cliente: {{$cliente->nombres}} {{$cliente->apellidos}}</h1>
</div>
<hr>
<div class="row"> 
    <div class="col-md-12"> 
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Datos Registrados</h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/clientes/show') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-3"> 
                            <div class="form-group">
                                <label for="">Nombres </label> 
                                <p> {{ $cliente->nombres }} </p>
                            </div>
                        </div>
                        <div class="col-md-3"> 
                            <div class="form-group">
                                <label for="">Apellidos </label> 
                                <p> {{ $cliente->apellidos }} </p>
                              
                            </div>
                        </div>
                        <div class="col-md-3"> 
                            <div class="form-group">
                                <label for="">DNI </label> 
                                <p> {{ $cliente->dni }}</p>
                                
                            </div>
                        </div>
                        <div class="col-md-3"> 
                            <div class="form-group">
                                <label for="">Fecha de nacimiento </label>
                                <p>{{ $cliente->fecha_nacimiento }}</p>
                            
                                
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3"> 
                            <div class="form-group">
                                <label for="">Genero </label>
                                <p>{{ $cliente->genero }}</p>
                            
                            
                            </div>
                        </div>
                        <div class="col-md-3"> 
                            <div class="form-group">
                                <label for="">Celular </label>
                                <p>{{ $cliente->celular }}</p>
                            
                            
                            </div>
                        </div>
                        <div class="col-md-3"> 
                            <div class="form-group">
                                <label for="">Dirección </label>
                                <p>{{ $cliente->direccion }}</p>
                             
                            </div>
                        </div>

                        <div class="col-md-3"> 
                            <div class="form-group">
                                <label for="">Correo </label>
                                <p>{{ $cliente->correo}}</p>
                             
                            </div>
                        </div>
                    </div>
                    <br>
                   
                    <hr>
                    <div class="row">
                        <div class="col-md-4"> 
                            <a href="{{ url('admin/clientes') }}" class="btn btn-secondary">Volver</a>
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
