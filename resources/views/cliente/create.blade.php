@extends('layout.header1')
@section('content')
<main class="main">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Agregar Cliente</h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('clientes.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Carnet Identidad </label>
                                    <div class="col-md-9">
                                        <input type="text" id="carnet_identidad" name="carnet_identidad" value="{{old('carnet_identidad')}}" class="form-control" placeholder="Ingrese el CI ">
                                        @error('carnet_identidad')
                                        <span style="color:red">(*) {{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Nombre </label>
                                    <div class="col-md-9">
                                        <input type="text" id="nombre" name="nombre" value="{{old('nombre')}}" class="form-control" placeholder="Ingrese el nombre">
                                        @error('nombre')
                                        <span style="color:red">(*) {{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                     <label class="col-md-3 form-control-label" for="text-input">Apellido Paterno</label>
                                     <div class="col-md-9">
                                         <input type="text" id="apellido_paterno" name="apellido_paterno" value="{{old('apellido_paterno')}}" class="form-control" placeholder="Ingrese el apellido paterno">
                                         @error('apellido_paterno')
                                        <span style="color:red">(*) {{$message}}</span>
                                        @enderror
                                      </div>
                                </div>
                                <div class="form-group row">
                                       <label class="col-md-3 form-control-label" for="text-input">Apellido Materno</label>
                                       <div class="col-md-9">
                                         <input type="text" id="apellido_materno" name="apellido_materno" value="{{old('apellido_materno')}}" class="form-control" placeholder="Ingrese el apellido materno">
                                         @error('apellido_materno')
                                        <span style="color:red">(*) {{$message}}</span>
                                        @enderror
                                       </div>
                                </div>
                        </div>
                    </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                        </form>
                </div>
</main>
@endsection