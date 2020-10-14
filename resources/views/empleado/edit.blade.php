@extends('layout.header1')
@section('content')
<main class="main">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                <form action="{{ route('empleados.update',[$empleado->id]) }}" method="post"  class="form-horizontal">
                @csrf
                @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Agregar Empleado</h4>
                        </div>
                        <div class="modal-body">
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Carnet Identidad </label>
                                    <div class="col-md-9">
                                        <input type="text" id="carnet_identidad" value="{{ $empleado->carnet_identidad }}" name="carnet_identidad" class="form-control" placeholder="Ingrese el CI ">
                                        @error('carnet_identidad')
                                         <span style="color:red">(*) {{ $message}}</span>
                                         @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Nombre </label>
                                    <div class="col-md-9">
                                        <input type="text" id="nombre" value="{{ $empleado->nombre }}" name="nombre" class="form-control" placeholder="Ingrese el nombre">
                                        @error('nombre')
                                         <span style="color:red">(*) {{ $message}}</span>
                                         @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                     <label class="col-md-3 form-control-label" for="text-input">Apellido Paterno</label>
                                     <div class="col-md-9">
                                         <input type="text" id="apellido_pterno" value="{{$empleado->apellido_paterno}}" name="apellido_paterno" class="form-control" placeholder="Ingrese el apellido paterno">
                                         @error('apellido_paterno')
                                         <span style="color:red">(*) {{ $message}}</span>
                                         @enderror
                                      </div>
                                </div>
                                <div class="form-group row">
                                       <label class="col-md-3 form-control-label" for="text-input">Apellido Materno</label>
                                       <div class="col-md-9">
                                         <input type="text" id="apellido_materno" value="{{$empleado->apellido_materno}}" name="apellido_materno" class="form-control" placeholder="Ingrese el apellido materno">
                                         @error('apellido_materno')
                                         <span style="color:red">(*) {{ $message}}</span>
                                         @enderror
                                       </div>
                                    </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="email-input">Cargo</label>
                                    <div class="col-md-9">
                                     <select class="form-control col-md-6"  name="cargo_id" id="cargo_id">
                                      <option value="" disabled selected >Elija el cargo</option>
                                      @foreach($cargos as $cargo)
                                      <option value="{{ $cargo->id }}" {{ $empleado->cargo_id == $cargo->id ? 'selected' : '' }} > {{$cargo->nombre}}</option>
                                      @endforeach
                                     </select>
                                     @error('cargo_id')
                                         <span style="color:red">(*) {{ $message}}</span>
                                         @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                       <label class="col-md-3 form-control-label" for="text-input">Telefono</label>
                                       <div class="col-md-9">
                                         <input type="text" id="telefono" value="{{$empleado->telefono}}" name="telefono" class="form-control" placeholder="Ingrese telefono">
                                         @error('telefono')
                                         <span style="color:red">(*) {{ $message}}</span>
                                         @enderror
                                       </div>
                                    </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="email-input">Estado</label>
                                    <div class="col-md-9">
                                     <select class="form-control col-md-6"  name="estado_id" id="estado_id">
                                      <option value="" disabled selected >Elija el estado</option>
                                      @foreach($estados as $estado)
                                      <option value="{{ $estado->id}}" {{ $empleado->estado_id == $estado->id ? 'selected' : '' }} >{{$estado->nombre}}</option>
                                      @endforeach
                                     </select>
                                     @error('estado_id')
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