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
                                        Ver / editar / borrar
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <script>
                            $(function () {
                              $("#example1").DataTable({
                                "responsive": true, "lengthChange": false, "autoWidth": false,
                                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                              }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                              $('#example2').DataTable({
                                "paging": true,
                                "lengthChange": false,
                                "searching": false,
                                "ordering": true,
                                "info": true,
                                "autoWidth": false,
                                "responsive": true,
                              });
                            });
                          </script>
                    </div>
                </div>
            
            </div>
            
            </div>
          
        
    </div>
</div>

@endsection