@extends('layout.header1')
@section('content')
<main class="main">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Agregar Libro a la Venta</h4>
                        </div>
                        <div class="modal-body">
                        <form action="{{route('detallesVentas.buscarLibro',[$venta->id])}}" method="GET">
                            <div class="form-group row">
                                     <div class="col-md-9">
                                         <div class="input-group">
                                            <select  class="form-control col-md-3" id="opcion" name="opcion">
                                               <option value="1">Nombre</option>
                                               <option value="2">Autor</option>
                                               <option value="3">Categoría</option>
                                            </select>
                                            
                                            <input type="text" id="texto" name="texto" class="form-control" placeholder="Texto a buscar">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                         </div>
                                     </div>
                             </div>
                             </form><br>
                            <form action="{{route('detallesVentas.store',[$venta->id])}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-md-12">
                                      <select class="form-control" id="libro_id" name="libro_id" >
                                      @foreach($libros as $libro)
                                        <option value="{{$libro->id}}">{{$libro->titulo}} &nbsp;&nbsp; (Autores : @foreach( $libro->detalle_autores as $autor)
                                               {{ $autor->autor->nombre_completo}} ,
                                             @endforeach) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Precio:  {{$libro->precio}} bs.</option>
                                      @endforeach
                                      </select> 
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                     <input type="number" class="form-control" name="cantidad" value="1" placeholder="Ingrese la cantidad">
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