@extends('layout.header1')
@section('content')
<main class="main">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                <form action="{{ route('proveedores.update',[$proveedor->id]) }}" method="post"  class="form-horizontal">
                @csrf
                @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Agregar Proveedor</h4>
                        </div>
                        <div class="modal-body">
                                
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Nombre </label>
                                    <div class="col-md-9">
                                        <input type="text" id="nombre" value="{{ $proveedor->nombre }}" name="nombre" class="form-control" placeholder="Ingrese el nombre">
                                        @error('nombre')
                                         <span style="color:red">(*) {{ $message}}</span>
                                         @enderror
                                    </div>
                                </div>
                             
                                <div class="form-group row">
                                       <label class="col-md-3 form-control-label" for="text-input">Telefono</label>
                                       <div class="col-md-9">
                                         <input type="text" id="telefono" value="{{$proveedor->telefono}}" name="telefono" class="form-control" placeholder="Ingrese telefono">
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
                                      <option value="{{ $estado->id}}" {{ $proveedor->estado_id == $estado->id ? 'selected' : '' }} >{{$estado->nombre}}</option>
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