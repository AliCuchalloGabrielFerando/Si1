@extends('layout.header1')
@section('content')
<main class="main">
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Autor
                        @if (Auth::user()->empleado->cargo->nombre == 'Administrador')
                        <a class="btn btn-secondary" href="{{ route('autores.create') }}"><i class="icon-plus"></i>&nbsp;Nuevo</a>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="texto" name="texto" class="form-control" placeholder="Texto a buscar">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Nombre Completo</th>
                                    @if (Auth::user()->empleado->cargo->nombre == 'Administrador')
                                    <th>Opciones</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($autores as $autor)
                                <tr>
                                    <td>{{ $autor->nombre_completo }}</td>
                                    @if (Auth::user()->empleado->cargo->nombre == 'Administrador')
                                    <td>
                                        <a href="{{ route('autores.edit',[$autor->id]) }}" class="btn btn-warning btn-sm"><i class="icon-pencil"></i></a>
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$autores->links('utils.paginacion')}}
                    </div>
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>
            <!--Fin del modal-->
        </main>
@endsection