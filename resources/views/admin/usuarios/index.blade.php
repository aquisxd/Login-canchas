@extends( 'layouts.admin' )
@section('content')
  <!-- Google Font: Source Sans Pro -->

<div class="container mt-4">
    <div class="row mb-3">
        <div class="col">
            <h1 class="text-center">Listado de Usuarios</h1>
        </div>
    </div>
    <hr>

    
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
            <div class="card-header">
            <h3 class="card-title">Usuarios Registrados </h3>
            <div class="card-tools">
            <a href="{{url('admin/usuarios/create')}}"  class="btn btn-primary">
                Registrar Nuevo
            </a>
            </div>
            
            </div>
            
            <div class="card-body">
               
                <div class="col">
                    <div class="table-responsive">
                     
                        
                        <table id="example1" class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th> <!-- Columna para el número -->
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuarios as $index => $usuario) <!-- Usamos $index para enumerar -->
                                <tr>
                                    <td>{{ $index + 1 }}</td> <!-- Muestra el número de fila -->
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td> 
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{url('/admin/usuarios/' .$usuario->id)}}" type="button" class="btn btn-info"><i class="bi bi-eye"></i></a>
                                            <a href="{{url('/admin/usuarios/'.$usuario->id.'/edit')}} " type="button" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                            <a href="{{url('/admin/usuarios/' .$usuario->id.'/confirm-delete')}}" type="button" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                    </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <script>
                            $(function () {
                                $("#example1").DataTable({
                                    "pageLength": 10,
                                    "language": {
                                        "emptyTable": "No hay información",
                                        "info": "Mostrando START a END de TOTAL Usuarios",
                                        "infoEmpty": "Mostrando 0 a 0 de 0 Usuarios",
                                        "infoFiltered": "(Filtrado de MAX total Usuarios)",
                                        "infoPostFix": "",
                                        "thousands": ",",
                                     //   <!--  "lengthMenu": "Mostrar MENU Usuarios", -->
                                        "loadingRecords": "Cargando...",
                                        "processing": "Procesando...",
                                        "search": "Buscador:",
                                        "zeroRecords": "Sin resultados encontrados",
                                        "paginate": {
                                            "first": "Primero",
                                            "last": "Ultimo",
                                            "next": "Siguiente",
                                            "previous": "Anterior"
                                        }
                                    },
                                    "responsive": true, "lengthChange": true, "autoWidth": false,
                                    buttons: [{
                                        extend: 'collection',
                                        text: 'Reportes',
                                        orientation: 'landscape',
                                        buttons: [{
                                            text: 'Copiar',
                                            extend: 'copy',
                                        }, {
                                            extend: 'pdf'
                                        },{
                                            extend: 'csv'
                                        },{
                                            extend: 'excel'
                                        },{
                                            text: 'Imprimir',
                                            extend: 'print'
                                        }
                                        ]
                                    },
                                        {
                                            extend: 'colvis',
                                            text: 'Visor de columnas',
                                            collectionLayout: 'fixed three-column'
                                        }
                                    ],
                                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                            });
                        </script>
                    </div>
                </div>
            
            </div>
            
            </div>
          
        
    </div>
</div>

@endsection