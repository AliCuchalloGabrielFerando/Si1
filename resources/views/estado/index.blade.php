@extends('layout.header1')
@section('content')
<main class="main">
             <!-- Breadcrumb -->
           
        
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Estado
                        <a class="btn btn-secondary" href="{{ route('estados.create') }}"><i class="icon-plus"></i>&nbsp;Nuevo</a>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <form action="{{ route('estados.buscar') }}" method="GET"  class="form-horizontal">
                                    @csrf
                               
                                <div class="input-group">
                                  
                                    <input type="text" id="texto" name="nombre" class="form-control" placeholder="Estado a buscar">
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

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($estado as $esta)
                                <tr>
                                    <td>
                                    <a href="{{ route('estados.edit',[$esta->id]) }}" class="btn btn-warning btn-sm"><i class="icon-pencil"></i></a>
                                    
                                    <form action="{{ route('estados.destroy',[$esta->id]) }}" method="POST">
                                        @csrf
                                         @method('DELETE')
                                    
                                        <button class="btn btn-danger btn-sm" type="submit" name="action" >
                                            <i class="fas fa-archive"></i>
                                          </button>
                                    </form>
                                        </td>
                                    
                                 
                                    <td>{{$esta->nombre}}</td>
                                   

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <nav>
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#"><</a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">3</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">4</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>
            <!-- Fin del modal Eliminar -->
        </main>
@endsection