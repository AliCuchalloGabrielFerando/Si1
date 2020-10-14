@extends('layout.header1')
@section('content')
<main class="main">
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Clientes
                        <a href="{{ route('clientes.create') }}"><span class="btn btn-secondary" data-badge-caption=""><i class="icon-plus">&nbsp;Nuevo</i></span></a>
                    </div>
                    <div class="card-body">
                            <form action="{{route('clientes.buscar')}}" method="get" enctype="multipart/form-data" >
                            <div class="form-group row">
                                     <div class="col-md-7">
                                         <div class="input-group">
                                            <select  class="form-control" id="opcion" name="opcion">
                                               <option value="1">Carnet Identidad</option>
                                               <option value="2">Apellido Paterno</option>
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
                                    <th>Carnet Identidad</th>
                                    <th>Nombre</th>
                                    <th>Apelido Paterno</th>
                                    <th>Apelido Materno</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($clientes as $cliente)
                                <tr>
                                    <td>{{ $cliente->carnet_identidad}}</td>
                                    <td>{{ $cliente->nombre }}</td>
                                    <td>{{ $cliente->apellido_paterno }}</td>
                                    <td>{{ $cliente->apellido_materno }}</td>
                                    <td>
                                    <a href="{{route('clientes.edit',[$cliente->id])}}"><span class="btn btn-warning btn-sm" data-badge-caption=""><i class="icon-pencil"></span></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$clientes->links('utils.paginacion')}}
                    </div>
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>
        </main>
@endsection