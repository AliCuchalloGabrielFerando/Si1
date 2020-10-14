@extends('layout.header1')
@section('content')
<main class="main">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                <form action="{{ route('estados.store') }}" method="POST"  class="form-horizontal">
                @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Agregar Estado</h4>
                        </div>
                        <div class="modal-body">

                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Nombre </label>
                                    <div class="col-md-9">
                                        <input type="text"  name="nombre" class="form-control" placeholder="Ingrese el nombre">
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