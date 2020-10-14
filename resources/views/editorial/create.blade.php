@extends('layout.header1')
@section('content')
<main class="main">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Agregar Editorial</h4>
                        </div>
                        <form action="{{ route('editoriales.store') }}" method="POST" class="form-horizontal">
                            @csrf
                        <div class="modal-body">
                            
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Nombre</label>
                                    <div class="col-md-9">
                                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre">
                                        @error('nombre')
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