@extends('layout.header1')
@section('content')
<main class="main">
             <!-- Breadcrumb -->
           
        
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Empleado
                        <a class="btn btn-secondary" href="{{ route('empleados.create') }}"><i class="icon-plus"></i>&nbsp;Nuevo</a>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <form action="{{ route('empleados.buscar') }}" method="GET"  class="form-horizontal">
                                    @csrf
                                <div class="input-group">
                                    <input type="text" id="texto" name="nombre" class="form-control" placeholder="Empleado a buscar">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                                </form>
                            </div>
                        </div>
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Opciones</th>
                                    <th>Carnet Identidad</th>
                                    <th>Nombre</th>
                                    <th>Apellido Paterno</th>
                                    <th>Apellido Materno</th>
                                    <th>Telefono</th>
                                    <th>Cargo</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($empleados as $empleado)
                                <tr>
                                    <td>
                                    <a href="{{ route('empleados.edit',[$empleado->id]) }}" class="btn btn-warning btn-sm"><i class="icon-pencil"></i></a>
                                    </td>
                                    <td>{{ $empleado->carnet_identidad}}</td>
                                    <td>{{$empleado->nombre}}</td>
                                    <td>{{$empleado->apellido_paterno}}</td>
                                    <td>{{$empleado->apellido_materno}}</td>
                                    <td>{{$empleado->telefono}}</td>
                                    <td>{{$empleado->cargo->nombre}}</td>
                                    <td>
                                        <span class="badge badge-success">{{$empleado->estado->nombre}}</span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$empleados->links('utils.paginacion')}}
                    </div>
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>
            <!-- Fin del modal Eliminar -->
        </main>
@endsection