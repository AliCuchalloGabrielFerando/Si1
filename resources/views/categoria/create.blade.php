@extends('layout.header1')
@section('content')
<main class="main">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Agregar Categoría</h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('categorias.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Categoría</label>
                                    <div class="col-md-9">
                                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Categoría">
                                       @error('nombre')
                                        <span style="color:red">(*) {{ $message }}</span>
                                       @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Descripción</label>
                                    <div class="col-md-9">
                                        <input type="text" id="descripcion" name="descripcion" class="form-control" placeholder="Descripción">
                                       @error('descripcion')
                                        <span style="color:red">(*) {{ $message }}</span>
                                       @enderror
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