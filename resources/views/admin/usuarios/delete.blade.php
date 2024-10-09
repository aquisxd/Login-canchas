@extends( 'layouts.admin' )
@section('content')

<div class="row">

  <h1>Usuario: {{$usuario->name}} </h1>

</div>

<hr>
<div class="row"> 

    <div class=col-md-10> 
  
            <div class="card  card-danger">
            <div class="card-header">
            <h3 class="card-title">¿Estas seguro de Eliminar este Usuario?</h3>
            <div class="card-tools">
            
            </div>
            
            </div>
            
            <div class="card-body">
            <form action="{{url('admin/usuarios',$usuario->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <div class="row">

                    <div class=col-md-10> 
                        <div class="from group">
                            <label for="">Nombre de Usuario </label>  <b></b>
                            <input type="text" value="{{$usuario->name}}" name="name" class="form-control" disabled>
                            @error('name')
                            <small style="color:red">{{$message}}</small>
                                
                            @enderror
                        </div>
                    </div>
                    
                </div>
                <br>
                <div class="row">
    
                    <div class=col-md-10> 
                        <div class="from group">
                            <label for="">Email </label>  <b></b>
                            <input type="email"  value="{{$usuario->email}}" name="email" class="form-control" disabled>
                            @error('email')
                            <small style="color:red">{{$message}}</small>
                                
                            @enderror
                          
                        </div>
                    </div>
                    

                </div>
                
               
                <hr>
                <div class="row">
    
                    <div class=col-md-10> 
                        <div class="from group">
                            <a href="{{url('admin/usuarios')}}"class="btn btn-secondary">Retroceder</a>
                            <button type="submit" class="btn btn-danger"> Eliminar Usuario</button>
    
                        </div>
                    </div>
                    
                </div>
            </form>



        
            </div>
            
            </div>


</div>
@endsection