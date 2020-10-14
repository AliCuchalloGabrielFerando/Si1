@extends('layout.header1')
@section('content')
<main class="main">
    <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Editar Libro</h4>
                        </div>
                        <div class="card-body">
                                     <form action="{{ route('detallesAutores.store',[$libro->id])}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                        @csrf
                                         <div class="form-group row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <input type="search"  name="autor_nombre" class="form-control" placeholder="Elija al autor" list="listAutor">
                                                    <datalist id="listAutor">
                                                    @foreach($autores as $autor)
                                                    <option value="{{ $autor->nombre_completo }}">
                                                    @endforeach
                                                    </datalist>
                                                    <button type="Submit" class="btn btn-secondary" data-toggle="modal" data-target="#modalNuevo">
                                                     <i class="icon-plus"></i>&nbsp;Agregar Autor
                                                    </button>
                                                   </div>
                                            </div>
                                            </form>
                                         </div>
                                         <table class="table table-bordered table-striped table-sm">
                                             <thead>
                                                 <tr>
                                                     <th>Autor</th>
                                                     <th>Opciones</th>
                                                 </tr>
                                             </thead>
                                             <tbody>
                                             @foreach($libro->detalle_autores as $libro_autor)
                                                 <tr>
                                                    <td>{{ $libro_autor->autor->nombre_completo}}</td>
                                                    <td>
                                                      <a href="{{route('detallesAutores.destroy',[$libro_autor->libro_id,$libro_autor->autor_id])}}"><span class="btn btn-danger btn-sm" data-badge-caption=""><i class="icon-trash"></i></spen></a>
                                                    </td>
                                                 </tr>
                                             @endforeach
                                             </tbody>
                                         </table>
                        <div class="modal-body">
                            <form action="{{ route('libros.update',[$libro->id]) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Título</label>
                                    <div class="col-md-9">
                                        <input type="text" id="titulo" name="titulo" value="{{ $libro->titulo }}" class="form-control" placeholder="Ingrese el título">
                                        @error('titulo')
                                        <span style="color:red">(*) {{ $message }}</span>
                                       @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Edición</label>
                                    <div class="col-md-9">
                                        <input type="text" id="edicion" name="edicion" value="{{ $libro->edicion }}" class="form-control" placeholder="Ingrese la edición">
                                        @error('edicion')
                                        <span style="color:red">(*) {{ $message }}</span>
                                       @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Año de Edición</label>
                                    <div class="col-md-9">
                                        <input type="text" id="edicion_año" name="edicion_año" value="{{ $libro->edicion_año }}" class="form-control" placeholder="Ingrese el año de edición">
                                        @error('edicion_año')
                                        <span style="color:red">(*) {{ $message }}</span>
                                       @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Editorial</label>
                                    <div class="col-md-9">
                                        <input type="search"  name="editorial_nombre" value="{{$libro->editorial->nombre}}" class="form-control" placeholder="Elija la editorial" list="listEditorial">
                                        <datalist id="listEditorial">
                                        @foreach($editoriales as $editorial)
                                           <option value="{{ $editorial->nombre}}">
                                        @endforeach
                                        </datalist>
                                        @error('editorial_nombre')
                                        <span style="color:red">(*) {{ $message }}</span>
                                       @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">IBSN_10</label>
                                    <div class="col-md-9">
                                        <input type="number" id="ibsn_10" name="ibsn_10" class="form-control" placeholder="Ingrese el isbn_10">
                                        @error('ibsn_10')
                                        <span style="color:red">(*) {{ $message }}</span>
                                       @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">IBSN_13</label>
                                    <div class="col-md-9">
                                        <input type="number" id="ibsn_13" name="ibsn_13" class="form-control" placeholder="Ingrese el isbn_13">
                                        @error('ibsn_13')
                                        <span style="color:red">(*) {{ $message }}</span>
                                       @enderror</div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Categoria</label>
                                    <div class="col-md-9">
                                        <input type="search"  name="categoria_nombre" value="{{ $libro->categoria->nombre}}" class="form-control" placeholder="Elija la categoria" list="listCategoria">
                                        <datalist id="listCategoria">
                                        @foreach($categorias as $categoria)
                                           <option value="{{ $categoria->nombre }}">
                                        @endforeach
                                        </datalist>
                                        @error('categoria_nombre')
                                        <span style="color:red">(*) {{ $message }}</span>
                                       @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Precio</label>
                                    <div class="col-md-9">
                                        <input type="number"  name="precio" value="{{ $libro->precio }}" class="form-control" placeholder="Ingrese el precio">
                                        @error('precio')
                                        <span style="color:red">(*) {{ $message }}</span>
                                       @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Stock</label>
                                    <div class="col-md-9">
                                        <input type="number"  name="stock" value="{{ $libro->stock }}" class="form-control" placeholder="Ingrese el stock">
                                        @error('stock')
                                        <span style="color:red">(*) {{ $message }}</span>
                                       @enderror
                                    </div>
                                </div>
                                </div>
                                </div>
                                </div>
                                <div class="modal-footer">
                                     <button type="submit" class="btn btn-primary">Actualizar</button>
                                </div>
                            </form>          
        </div>
</main>
@endsection