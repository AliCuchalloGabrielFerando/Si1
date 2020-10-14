@extends('layout.header1')
@section('content')
<main class="main">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Venta</h4>
                        </div>
                        <div class="modal-body">
                             <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="email-input">Fecha</label>
                                    <div class="col-md-9">
                                     <span class="help-block">{{$venta->created_at}} </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="email-input">Cliente</label>
                                    <div class="col-md-9">
                                     <span class="help-block">{{$venta->cliente->nombre}} {{$venta->cliente->apellido_paterno}} {{$venta->cliente->apellido_materno}} </span>
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="email-input">Monto De Venta</label>
                                    <div class="col-md-9">
                                     <span class="help-block">{{$venta->monto_venta}} </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="email-input">Monto De Descuento</label>
                                    <div class="col-md-9">
                                     <span class="help-block">{{$venta->monto_descuento}} </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="email-input">Monto De Total</label>
                                    <div class="col-md-9">
                                     <span class="help-block">{{$venta->monto_total}} </span>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>

                 <div class="modal-footer">
                 <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                <div class="card-header">
                        <i class="fa fa-align-justify"></i> Libros
                        <a href="{{route('detallesVentas.create',[$venta->id])}}"><span class="btn btn-secondary" data-badge-caption=""><i class="icon-plus">&nbsp;Nuevo</i></span></a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Opciones</th>
                                    <th>Libro</th>
                                    <th>Edición</th>
                                    <th>Autor</th>
                                    <th>Editorial</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Precio Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($venta->detalle_ventas as $detalle_venta)
                                <tr>
                                <td>
                                   <!-- <a href=""><span class="btn btn-warning btn-sm" data-badge-caption=""><i class="icon-pencil"></span></i></a>-->
                                    <a href="{{route('detallesVentas.destroy',[$detalle_venta])}}" onClick="return confirm('¿ Estas seguro que deseas eliminar el libro ?')"><span class="btn btn-danger btn-sm" data-badge-caption=""><i class="icon-trash"></i></spen></a>
                                    </td>
                                    <td>{{$detalle_venta->libro->titulo}}</td>
                                    <td>{{$detalle_venta->libro->edicion}}</td>
                                    <td>
                                    @foreach($detalle_venta->libro->detalle_autores as $autor)
                                      {{$autor->autor->nombre_completo}},</br>
                                    @endforeach 
                                    </td>
                                    <td>{{$detalle_venta->libro->editorial->nombre}}</td>
                                    <td>{{$detalle_venta->precio_unitario}}</td>
                                    <td>{{$detalle_venta->cantidad}}</td>
                                    <td>{{$detalle_venta->precio}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>
       </div>
</main>
@endsection