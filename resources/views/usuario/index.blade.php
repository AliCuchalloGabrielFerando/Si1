@extends('layout.header1')
@section('content')
<main class="main">
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                <div class="card-header">
                        <i class="fa fa-align-justify"></i> Usuarios 
                        <a href="{{ route('usuarios.create') }}"><span class="btn btn-secondary" data-badge-caption=""><i class="icon-plus">&nbsp;Nuevo</i></span></a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Opciones</th>
                                    <th>Correo Electrónico</th>
                                    <th>Empleado</th>
                                    <th>Fecha de Creación</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($usuarios as $usuario)
                                <tr>
                                    <td>
                                    <a href="{{route('usuarios.edit',[$usuario->id])}}"><span class="btn btn-warning btn-sm" data-badge-caption=""><i class="icon-pencil"></span></i></a>
                                    <a href="{{route('usuarios.destroy',[$usuario->id])}}" onClick="return confirm('¿ Estas seguro que deseas eliminar al usuario ?')"><span class="btn btn-danger btn-sm" data-badge-caption=""><i class="icon-trash"></i></spen></a>
                                    </td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>{{ $usuario->empleado->nombre.' '.$usuario->empleado->apellido_paterno.' '.$usuario->empleado->apellido_materno }}</td>
                                    <td>{{ $usuario->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$usuarios->links('utils.paginacion')}}
                    </div>
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>
        </main>
@endsection