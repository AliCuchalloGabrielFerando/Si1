@extends('layout.header1')
@section('content')
<main class="main">
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> RECIBOS
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Nro</th>
                                    <th>Cliente</th>
                                    <th>Fecha de recibo</th>
                                    <th>Monto de recibo</th>
                                    <th>Monto Total de Venta</th>
                                    <th>Empleado</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($recibos as $recibo)
                                <tr>
                                    <td>{{$recibo->id}}</td>
                                    <td>{{$recibo->venta->cliente->nombre.' '.$recibo->venta->cliente->apellido_paterno.' '.$recibo->venta->cliente->apellido_materno}}</td>
                                    <td>{{$recibo->created_at}}</td>
                                    <td>{{$recibo->monto}}</td>
                                    <td>{{$recibo->venta->monto_total}}</td>
                                    <td>{{$recibo->venta->empleado->nombre.' '.$recibo->venta->empleado->apellido_paterno.' '.$recibo->venta->empleado->apellido_materno}}</td>
                                    <td>
                                      <a href="{{route('recibos.show',[$recibo->id])}}"><span class="btn btn-warning btn-sm" data-badge-caption=""><i class="icon-info"></i></span></a>
                                      <a href="{{route('recibos.destroy',[$recibo->id])}}" onClick="return confirm('¿ Estas seguro que deseas eliminar el recibo ?')"><span class="btn btn-danger btn-sm" data-badge-caption=""><i class="icon-trash"></i></span></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$recibos->links('utils.paginacion')}}
                    </div>
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>
        </main>
@endsection