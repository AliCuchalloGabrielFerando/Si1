@extends('layout.header1')
@section('content')
<main class="main">
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Categoría
                        @if (Auth::user()->empleado->cargo->nombre == 'Administrador')
                        <a class="btn btn-secondary" href="{{ route('categorias.create') }}"><i class="icon-plus"></i>&nbsp;Nuevo</a>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                            <form action="{{ route('categorias.buscar') }}" method="GET" class="form-horizontal">
                                <div class="input-group">
                                    <input type="text" id="texto" name="nombre" class="form-control" placeholder="Categoría a buscar">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </form>
                            </div>
                        </div>
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    @if (Auth::user()->empleado->cargo->nombre == 'Administrador')
                                    <th>Opciones</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($categorias as $categoria)
                                <tr>
                                    <td>{{ $categoria->nombre }}</td>
                                    <td>{{ $categoria->descripcion }}</td>
                                    @if (Auth::user()->empleado->cargo->nombre == 'Administrador')
                                    <td>
                                    <a href="{{ route('categorias.edit',[$categoria->id]) }}"><span class="btn btn-warning btn-sm" data-badge-caption=""><i class="icon-pencil"></span></i></a>
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$categorias->links('utils.paginacion')}}
                    </div>
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>
        </main>
@endsection