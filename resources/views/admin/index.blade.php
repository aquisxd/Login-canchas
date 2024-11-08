@extends('layouts.admin')

@section('content')
<div class="row">
    <h1>Página Principal</h1>
</div>
<hr>
<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$total_usuarios}}</h3>
                <p>Usuarios</p>
            </div>
            <div class="icon">
                <i class="ion bi bi-file-person"></i>
            </div>
            <a href="{{url('admin/usuarios')}}" class="small-box-footer">
                Más información <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{$total_secretarias}}</h3>
                <p>Secretarias</p>
            </div>
            <div class="icon">
                <i class="ion bi bi-person-workspace"></i>
            </div>
            <a href="{{url('admin/secretarias')}}" class="small-box-footer">
                Más información <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{$total_clientes}}</h3>
                <p>Clientes</p>
            </div>
            <div class="icon">
                <i class="ion bi nav-icon bi bi-person-vcard"></i>
            </div>
            <a href="{{url('admin/clientes')}}" class="small-box-footer">
                Más información <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{$total_canchas}}</h3>
                <p>Canchas</p>
            </div>
            <div class="icon">
                <i class="ion nav-icon bi bi-file-earmark-spreadsheet"></i>
            </div>
            <a href="{{url('admin/canchas')}}" class="small-box-footer">
                Más información <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>
@endsection