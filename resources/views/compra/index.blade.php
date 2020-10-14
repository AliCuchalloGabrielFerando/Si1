@extends('layout.header1')
@section('content')
<main class="main">
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                <div class="card-header">
                        <i class="fa fa-align-justify"></i> COMPRAS
                        <a href="{{ route('compras.create') }}"><span class="btn btn-secondary" data-badge-caption=""><i class="icon-plus">&nbsp;Nuevo</i></span></a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Opciones</th>
                                    <th>Fecha de compra</th>
                                    <th>Proveedor</th>
                                    <th>Monto Total</th>
                                    <th>Empleado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($compras as $compra)
                                    
                               
                                <tr>
                                <td>
                                    <a href="{{ route('compras.show',[$compra->id]) }}"><span class="btn btn-warning btn-sm" data-badge-caption=""><i class="icon-pencil"></i></span></a>
                                    <a href="{{ route('compras.destroy',[$compra->id]) }}"><span class="btn btn-danger btn-sm" data-badge-caption=""><i class="icon-trash"></i></span></a>
                                    </td>
                                    <td>{{ $compra->fecha }}</td>
                                    <td>{{ $compra->proveedor->nombre }}</td>
                                    <td>{{ $compra->monto_total }}</td>
                                    <td>{{ $compra->empleado->nombre }}
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$compras->links('utils.paginacion')}}
                    </div>
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>
        </main>
@endsection