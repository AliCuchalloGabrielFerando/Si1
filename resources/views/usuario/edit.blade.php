@extends('layout.header1')
@section('content')
<main class="main">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Actualizar Usuario</h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('usuarios.update',[$usuario->id]) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                               @csrf
                               @method('PUT')
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="email-input">Empleado</label>
                                    <div class="col-md-9">
                                     <select class="form-control" id="empleado_id" name="empleado_id">
                                     <option value="" disabled selected>Elija al empleado</option>
                                     @foreach($empleados as $empleado)
                                      <option value="{{$empleado->id}}"{{$usuario->empleado->id == $empleado->id ? 'selected':''}}>{{ $empleado->nombre }} {{$empleado->apellido_paterno}} {{$empleado->apellido_materno}}</option>
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
                                        <input type="email" id="correo" name="correo" value="{{$usuario->email}}" class="form-control" placeholder="Ingrese el correo electrónico">
                                        @error('correo')
                                         <span style="color:red">(*) {{ $message}}</span>
                                         @enderror
                                    </div>
                                </div>
                        </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                        </form>
                   
                    <!-- /.modal-content -->
                </div>
</main>
@endsection