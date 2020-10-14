@extends('layout.header1')
@section('content')
<main class="main">
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                <div class="card-header">
                        <i class="fa fa-align-justify"></i> Ventas 
                        <a href="{{route('ventas.create')}}"><span class="btn btn-secondary" data-badge-caption=""><i class="icon-plus">&nbsp;Nuevo</i></span></a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Opciones</th>
                                    <th>Cliente</th>
                                    <th>Fecha de venta</th>
                                    <th>Monto de Venta</th>
                                    <th>Monto de Descuento</th>
                                    <th>Monto Total</th>
                                    <th>Empleado</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($ventas as $venta)
                                <tr>
                                <td>
                                    <a href="{{route('ventas.show',[$venta->id])}}"><span class="btn btn-secondary btn-sm" data-badge-caption=""><i class="icon-info"></i></span></a>
                                    <a href="{{route('ventas.edit',[$venta->id])}}" ><span class="btn btn-warning btn-sm" data-badge-caption=""><i class="icon-pencil"></i></span></a>
                                    <a href="{{route('ventas.destroy',[$venta->id])}}" onClick="return confirm('¿ Estas seguro que deseas eliminar esta venta ?')" ><span class="btn btn-danger btn-sm" data-badge-caption=""><i class="icon-trash"></i></span></a>
                                    <a href="{{route('recibos.store',[$venta->id])}}" onClick="return confirm('¿ Estas seguro que deseas hacer un recibo ?')" ><span class="btn btn-primary btn-sm" data-badge-caption=""><i class="icon-note"></i></span></a>
                                    </td>
                                    <td>{{$venta->cliente->nombre}} {{$venta->cliente->apellido_paterno}} {{$venta->cliente->apellido_materno}}</td>
                                    <td>{{$venta->created_at}}</td>
                                    <td>{{$venta->monto_venta}}</td>
                                    <td>{{$venta->monto_descuento}}</td>
                                    <td>{{$venta->monto_total}}</td>
                                    <td>{{$venta->empleado->nombre}} {{$venta->empleado->apellido_paterno}} {{$venta->empleado->apellido_materno}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$ventas->links('utils.paginacion')}}
                    </div>
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>
        </main>
@endsection