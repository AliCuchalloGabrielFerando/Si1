@extends('layout.header1')
@section('content')
<main class="main">
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Cargo
                        <a class="btn btn-secondary" href="{{ route('cargos.create') }}"><i class="icon-plus"></i>&nbsp;Nuevo</a>
                    </div>
                    <div class="card-body">
                        
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($cargos as $cargo)
                                <tr>
                                    <td>{{ $cargo->nombre }}</td>
                                    <td>
                                        <a href="{{ route('cargos.edit',[$cargo->id]) }}" class="btn btn-warning btn-sm"><i class="icon-pencil"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                       
                    </div>
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>
        </main>
@endsection