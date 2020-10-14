@extends('layout.header1')
@section('content')
<main class="main">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Agregar Autor</h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('autores.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                               @csrf
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Nombre Completo</label>
                                    <div class="col-md-9">
                                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre Completo">
                                        <span class="help-block">(*) Ingrese el nombre completo del autor </span>
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