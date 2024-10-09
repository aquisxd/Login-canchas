@extends( 'layouts.admin' )
@section('content')

<div class="row">

  <h1>Modificar Usuario: {{$usuario->name}} </h1>

</div>

<hr>
<div class="row"> 

    <div class=col-md-10> 
  
            <div class="card card-outline card-success">
            <div class="card-header">
            <h3 class="card-title">Complete los Datos</h3>
            <div class="card-tools">
            
            </div>
            
            </div>
            
            <div class="card-body">
            <form action="{{url('admin/usuarios',$usuario->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">

                    <div class=col-md-10> 
                        <div class="from group">
                            <label for="">Nombre de Usuario </label>  <b>*</b>
                            <input type="text" value="{{$usuario->name}}" name="name" class="form-control" required>
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
                            <label for="">Email </label>  <b>*</b>
                            <input type="email"  value="{{$usuario->email}}" name="email" class="form-control" required>
                            @error('email')
                            <small style="color:red">{{$message}}</small>
                                
                            @enderror
                          
                        </div>
                    </div>
                    

                </div>
                <br>
                <div class="row">
    
                    <div class=col-md-10> 
                        <div class="from group">
                            <label for="">Contraseña </label> 
                            <input type="password" value="{{old('password')}}"  name="password"  class="form-control" >
                            @error('password')
                            <small style="color:red">{{$message}}</small>
                                
                            @enderror
                        </div>
                    </div>
                    
                </div>
                <br>
                <div class="row">
    
                    <div class=col-md-10> 
                        <div class="from group">
                            <label for="">Confirmar Contraseña </label> 
                            <input type="password" name="password_confirmation" class="form-control" >
                            @error('password_confirmation')
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
                            <button type="submit" class="btn btn-success"> Actualizar Usuario</button>
    
                        </div>
                    </div>
                    
                </div>
            </form>



        
            </div>
            
            </div>


</div>
@endsection