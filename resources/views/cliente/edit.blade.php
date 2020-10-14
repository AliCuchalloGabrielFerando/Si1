@extends('layout.header1')
@section('content')
<main class="main">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Editar Cliente</h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('clientes.update',[$cliente->id]) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Carnet Identidad </label>
                                    <div class="col-md-9">
                                        <input type="text" id="carnet_identidad" name="carnet_identidad" value="{{ $cliente->carnet_identidad }}" class="form-control" placeholder="Ingrese el CI ">
                                        @error('carnet_identidad')
                                        <span style="color:red">(*) {{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Nombre </label>
                                    <div class="col-md-9">
                                        <input type="text" id="nombre" name="nombre" value="{{ $cliente->nombre }}" class="form-control" placeholder="Ingrese el nombre">
                                        @error('nombre')
                                        <span style="color:red">(*) {{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                     <label class="col-md-3 form-control-label" for="text-input">Apellido Paterno</label>
                                     <div class="col-md-9">
                                         <input type="text" id="apellido_paterno" name="apellido_paterno" value="{{ $cliente->apellido_paterno }}" class="form-control" placeholder="Ingrese el apellido paterno">
                                         @error('apellido_paterno')
                                        <span style="color:red">(*) {{$message}}</span>
                                        @enderror
                                      </div>
                                </div>
                                <div class="form-group row">
                                       <label class="col-md-3 form-control-label" for="text-input">Apellido Materno</label>
                                       <div class="col-md-9">
                                         <input type="text" id="apellido_materno" name="apellido_materno" value="{{ $cliente->apellido_materno }}" class="form-control" placeholder="Ingrese el apellido materno">
                                         @error('apellido_materno')
                                        <span style="color:red">(*) {{$message}}</span>
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