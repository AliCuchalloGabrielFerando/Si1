@extends('layout.header1')
@section('content')
<main class="main">
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Libros
                        @if (Auth::user()->empleado->cargo->nombre == 'Administrador')
                        <a class="btn btn-secondary" href="{{ route('libros.create') }}"><i class="icon-plus"></i>&nbsp;Nuevo</a>
                        @endif
                    </div>
                    <div class="card-body">
                        <form action="{{route('libros.buscar')}}" method="GET">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select class="form-control col-md-3" id="opcion" name="opcion">
                                      <option value="1">Nombre</option>
                                      <option value="2">Autor</option>
                                      <option value="3">Categoría</option>
                                    </select>
                                    <input type="text" id="texto" name="texto" class="form-control" placeholder="Texto a buscar">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </div>
                      </form>
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                @if (Auth::user()->empleado->cargo->nombre == 'Administrador')
                                    <th>Opciones</th>
                                @endif
                                    <th>Título</th>
                                    <th>Edición</th>
                                    <th>Año de Edición</th>
                                    <th>Editorial</th>
                                    <th>Categoria</th>
                                    <th>Autores</th>
                                    <th>Precio</th>
                                    <th>Stock</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($libros as $libro)
                                <tr>
                                @if (Auth::user()->empleado->cargo->nombre == 'Administrador')
                                    <td>
                                    <a href="{{route('libros.edit',[$libro->id])}}" class="btn btn-warning btn-sm"><i class="icon-pencil"></i></a>
                                    </td>
                                @endif
                                    <td>{{ $libro->titulo }}</td>
                                    <td>{{ $libro->edicion }}</td>
                                    <td>{{ $libro->edicion_año }}</td>
                                    <td>{{ $libro->editorial->nombre}}</td>
                                    <td>{{ $libro->categoria->nombre }}</td>
                                    <td>
                                    @foreach( $libro->detalle_autores as $autor)
                                     {{$autor->autor->nombre_completo}} ,</br>
                                    @endforeach
                                    </td>
                                    <td>{{$libro->precio}}</td>
                                    <td>{{$libro->stock}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$libros->links('utils.paginacion')}}
                    </div>
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>
           
        </main>
@endsection