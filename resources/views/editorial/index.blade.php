@extends('layout.header1')
@section('content')
<main class="main">
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Editorial
                        @if (Auth::user()->empleado->cargo->nombre == 'Administrador')
                        <a class="btn btn-secondary" href="{{ route('editoriales.create') }}"><i class="icon-plus"></i>&nbsp;Nuevo</a>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <form action="{{ route('editoriales.buscar') }}" method="GET" class="form-horizontal">
                                    @csrf
                                <div class="input-group">
                                    <input type="text" id="texto" name="nombre" class="form-control" placeholder="Editorial a buscar">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                                </form>
                            </div>
                        </div>
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    @if (Auth::user()->empleado->cargo->nombre == 'Administrador')
                                    <th>Opciones</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($editoriales as $editorial)
                                    
                                
                                <tr>
                                    <td>{{$editorial->nombre}}</td>
                                    @if (Auth::user()->empleado->cargo->nombre == 'Administrador')
                                    <td>
                                        <a href="{{ route('editoriales.edit',[$editorial->id]) }}" class="btn btn-warning btn-sm"><i class="icon-pencil"></i></a>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                               
                            </tbody>
                        </table>
                        {{$editoriales->links('utils.paginacion')}}
                    </div>
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>
        </main>
@endsection