@extends('layout.header1')
@section('content')
<main class="main">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Editar Venta</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row">
                                     <div class="col-md-7">
                                         <div class="input-group">
                                            <select  class="form-control" id="opcion" name="opcion">
                                               <option value="1">Carnet Identidad</option>
                                               <option value="2">Apellido Paterno</option>
                                            </select>
                                            <input type="text" id="texto" name="texto" class="form-control" placeholder="Texto a buscar">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                         </div>
                                     </div>
                             </div>
                            <form action="{{route('ventas.update',[$venta->id])}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <div class="col-md-12">
                                    <select class="form-control" id="cliente_id" name="cliente_id">
                                        @foreach($clientes as $cliente)
                                        <option value="{{$cliente->id}}" {{$venta->cliente_id == $cliente->id ? 'selected':''}}>{{$cliente->nombre}} {{$cliente->apellido_paterno}} {{$cliente->apellido_materno}}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                </div>
                                </div>
                                </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                        </form>
                    <!-- /.modal-content -->
                
</main>
@endsection