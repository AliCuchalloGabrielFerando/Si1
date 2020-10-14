@extends('layout.header1')
@section('content')
<main class="main">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Perfil</h4>
                        </div>
                        <div class="modal-body">
                        <center>
                            <p style="color:blue" ><strong>{{$usuario->email}}<br>{{$usuario->empleado->cargo->nombre}}</strong><br>
                            {{$usuario->empleado->nombre}} {{$usuario->empleado->apellido_paterno}} {{$usuario->empleado->apellido_materno}}<br>
                            {{$usuario->empleado->telefono}}</p>
                        </center>
                        </div>
                        <form action="{{route('usuarios.cambiarContraseña',[$usuario->id])}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-footer">
                               <div class="form-group row">
                                     <label class="col-md-3 form-control-label" for="text-input">Nueva Contraseña</label>
                                     <div class="col-md-9">
                                         <input type="password" id="password" name="password" class="form-control" placeholder="Ingrese la nueva contraseña">
                                         @error('password')
                                         <span style="color:red">(*) {{ $message}}</span>
                                         @enderror
                                      </div>
                                </div>
                                <div class="form-group row">
                                     <label class="col-md-3 form-control-label" for="text-input">Repetir Contraseña</label>
                                     <div class="col-md-9">
                                         <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="De nuevo la ontraseña">
                                      </div>
                                </div>
                        <button type="submit" class="btn btn-primary">Cambiar</br>Contraseña</button>
                        </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
</main>
@endsection