@extends('layout.header1')
@section('content')
<main class="main">
        
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Proveedor
                        <a class="btn btn-secondary" href="{{ route('proveedores.create') }}">
                            <i class="icon-plus"></i>&nbsp;Nuevo</a>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <form action="{{ route('proveedores.buscar') }}" method="GET"  class="form-horizontal">
                                    @csrf
                                <div class="input-group">
                                    <input type="text" id="texto" name="nombre" class="form-control" placeholder="Proveedor a buscar">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                                </form>
                            </div>
                        </div>
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Opciones</th>
                                    <th>Nombre</th>
                                    <th>Telefono</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($proveedores as $proveedor)
                                <tr>
                                    <td>
                                        <a href="{{ route('proveedores.edit',[$proveedor->id]) }}"><span class="btn btn-warning btn-sm" data-badge-caption=""><i class="icon-pencil"></span></i></a>
                                         
                                    </td>
                                        <td>{{ $proveedor->nombre }}</td>
                                        <td>{{ $proveedor->telefono }}</td>
                                        
                                        <td>
                                            <span class="badge badge-success">{{ $proveedor->estado->nombre }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                        {{$proveedores->links('utils.paginacion')}}
                    </div>
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>
            <!-- Inicio del modal Eliminar -->
           @include('proveedor.delete')
            <!-- Fin del modal Eliminar -->
        </main>
@endsection