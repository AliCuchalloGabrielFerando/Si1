@extends('layout.header1')
@section('content')
<main class="main">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Buscar al Cliente de la Venta</h4>
                        </div>
                        <div class="modal-body">
                        <form action="{{route('ventas.buscarCliente')}}" method="get" enctype="multipart/form-data" >
                            <div class="form-group row">
                                     <div class="col-md-8">
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
                             </form>
                            <form action="{{route('ventas.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                              @csrf
                                <div class="form-group row">
                                    <div class="col-md-12">
                                      <select class="form-control" id="cliente_id" name="cliente_id">
                                        @foreach($clientes as $cliente)
                                        <option value="{{$cliente->id}}">{{$cliente->nombre}} {{$cliente->apellido_paterno}} {{$cliente->apellido_materno}}</option>
                                        @endforeach
                                      </select> 
                                    </div>
                                </div></br>
                                    <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="email-input">Descuento</label>
                                    <div class="col-md-9">
                                     <select class="form-control col-md-6" id="descuento_id" name="descuento_id">
                                      <option value="" disabled selected >Elija el descuento</option>
                                      @foreach($descuentos as $descuento)
                                      <option value="{{$descuento->id}}" {{old('descuento_id')==$descuento->id ? 'selected': ''}}>{{$descuento->nombre}}</option>
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
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                        </form>
                    
                    <!-- /.modal-content -->
               
</main>
@endsection