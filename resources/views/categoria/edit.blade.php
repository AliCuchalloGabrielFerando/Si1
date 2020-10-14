@extends('layout.header1')
@section('content')
<main class="main">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Editar Categoría</h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('categorias.update',[$categoria->id]) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Categoría</label>
                                    <div class="col-md-9">
                                        <input type="text" id="nombre" value="{{ $categoria->nombre }}" name="nombre" class="form-control" placeholder="Ingrese el nombre">
                                        @error('nombre')
                                        <span style="color:red">(*) {{ $message }}</span>
                                       @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Descripción</label>
                                    <div class="col-md-9">
                                        <input type="text" id="descripcion" value="{{ $categoria->descripcion }}" name="descripcion" class="form-control" placeholder="Ingrese la descripción">
                                        @error('descripcion')
                                        <span style="color:red">(*) {{ $message }}</span>
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