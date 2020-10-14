@extends('layout.header1')
@section('content')
<main class="main">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Agregar Proveedor</h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('proveedores.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Nombre Completo</label>
                                    <div class="col-md-9">
                                        <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" class="form-control" placeholder="Nombre Completo">
                                        @error('nombre')
                                        <span style="color: red">(*) Ingrese el nombre completo</span>
                                        @enderror
                                        
                                    </div>
                                </div>
                                <div class="form-group row">
                                     <label class="col-md-3 form-control-label" for="text-input">Telefono</label>
                                     <div class="col-md-9">
                                         <input type="text" id="telefono" name="telefono" class="form-control" placeholder="Telefono">
                                         @error('telefono')
                                         <span style="color:red">(*) {{ $message }}</span> 
                                         @enderror
                                         
                                      </div>
                                </div>
                             
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="email-input">Estado</label>
                                    <div class="col-md-9">
                                     <select class="form-control col-md-6" id="estado_id" name="estado_id">
                                      <option value="" disabled selected >Elija el estado</option>
                                      @foreach($estados as $estado)
                                      <option value="{{$estado->id}}" {{old('estado_id')==$estado->id ? 'selected': ''}}>{{$estado->nombre}}</option>
                                      @endforeach
                                     </select>
                                     @error('estado_id')
                                         <span style="color:red">(*) {{$message}}</span>
                                         @enderror
                                    </div>
                                </div>
                                </div>
                   
                   </div>
                                <div class="modal-footer">
                                    <a href="{{ route('proveedores.index') }}" class="btn btn-secondary" data-dismiss="modal">Atras</a>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </form>
                       
</main>
@endsection