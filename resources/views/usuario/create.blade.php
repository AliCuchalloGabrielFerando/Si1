@extends('layout.header1')
@section('content')
<main class="main">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Agregar Usuario</h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('usuarios.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                               @csrf
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="email-input">Empleado</label>
                                    <div class="col-md-9">
                                     <select class="form-control" id="empleado_id" name="empleado_id">
                                     <option value="" disabled selected>Elija al empleado</option>
                                     @foreach($empleados as $empleado)
                                      <option value="{{$empleado->id}}"  {{old('empleado_id')==$empleado->id ? 'selected':''}}>{{ $empleado->nombre }} {{$empleado->apellido_paterno}} {{$empleado->apellido_materno}}</option>
                                     @endforeach
                                     </select> 
                                       @error('empleado_id')
                                         <span style="color:red">(*) {{ $message}}</span>
                                         @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Correo Electrónico</label>
                                    <div class="col-md-9">
                                        <input type="email" id="correo" name="correo" value="{{old('correo')}}" class="form-control" placeholder="Ingrese el correo electrónico">
                                        @error('correo')
                                         <span style="color:red">(*) {{ $message}}</span>
                                         @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                     <label class="col-md-3 form-control-label" for="text-input">Contraseña</label>
                                     <div class="col-md-9">
                                         <input type="password" id="password" name="password"  class="form-control" placeholder="Ingrese la contraseña">
                                         @error('password')
                                         <span style="color:red">(*) {{ $message}}</span>
                                         @enderror
                                         <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Ingrese de nuevo la contraseña">
                                      </div>
                                </div>
                        </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                        </form>
                   
                    <!-- /.modal-content -->
                </div>
</main>
@endsection