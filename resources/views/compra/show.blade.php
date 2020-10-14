@extends('layout.header1')
@section('content')
<main class="main">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Compra</h4>
                        </div>
                        <div class="modal-body">
                             <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="email-input">Fecha</label>
                                    <div class="col-md-9">
                                     <span class="help-block">{{ $compra->fecha }} </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="email-input">Proveedor</label>
                                    <div class="col-md-9">
                                     <span class="help-block">{{ $compra->proveedor->nombre }} </span>
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="email-input">Monto Total</label>
                                    <div class="col-md-9">
                                     <span class="help-block">{{ $compra->monto_total }} </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="email-input">Empleado</label>
                                    <div class="col-md-9">
                                     <span class="help-block">{{ $compra->empleado->nombre }} </span>
                                    </div>
                                </div>
                                <div >
                                    <a href="{{ route('compras.index') }}" class="btn btn-primary" data-dismiss="modal">Volver</a>
                                    
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
                        <i class="fa fa-align-justify"></i> Detalle
                        <a href="{{ route('detallescompras.create',[$compra->id]) }}"><span class="btn btn-secondary" data-badge-caption=""><i class="icon-plus">&nbsp;Nuevo</i></span></a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Opciones</th>
                                    <th>Libro</th>
                                    <th>Autores</th>
                                    <th>Edición</th>
                                    <th>Editorial</th>
                                    <th>Precio Compra</th>
                                    <th>Precio Venta</th>
                                    <th>Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($compra->detallecompra as $detalle)    
                                
                                <tr>
                                <td>
                                   <!-- <a href=""><span class="btn btn-warning btn-sm" data-badge-caption=""><i class="icon-pencil"></span></i></a>-->
                                    <a href="{{ route('detallescompras.destroy',[$detalle->id,$compra->id]) }}"><span class="btn btn-danger btn-sm" data-badge-caption=""><i class="icon-trash"></i></spen></a>
                                    </td>
                                    <td>{{ $detalle->libro->titulo }}</td>
                                    <td>@foreach ($detalle->libro->detalle_autores as $autores)
                                     {{$autores->autor->nombre_completo}}</br> @endforeach</td>
                                    <td>{{ $detalle->libro->edicion }}</td>
                                    <td>{{ $detalle->libro->editorial->nombre }}</td>
                                    <td>{{ $detalle->precio_unitario }}</td>
                                    <td>{{ $detalle->libro->precio }}</td>
                                    <td>{{ $detalle->cantidad }}</td>
                                    
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