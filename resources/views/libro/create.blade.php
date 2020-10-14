@extends('layout.header1')
@section('content')
<main class="main">
    <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Agregar Libro</h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('libros.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                               @csrf
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Título</label>
                                    <div class="col-md-9">
                                        <input type="text" id="titulo" name="titulo" value="{{old('titulo')}}" class="form-control" placeholder="Ingrese el título">
                                        @error('titulo')
                                        <span style="color:red">(*) {{ $message }}</span>
                                       @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Edición</label>
                                    <div class="col-md-9">
                                        <input type="number" id="edicion" name="edicion" value="{{old('edicion')}}" class="form-control" placeholder="Ingrese la edición">
                                        @error('edicion')
                                        <span style="color:red">(*) {{ $message }}</span>
                                       @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Año de Edición</label>
                                    <div class="col-md-9">
                                        <input type="text" id="edicion_año" name="edicion_año" value="{{old('edicion_año')}}" class="form-control" placeholder="Ingrese el año de edición">
                                        @error('edicion_año')
                                        <span style="color:red">(*) {{ $message }}</span>
                                       @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Editorial</label>
                                    <div class="col-md-9">
                                        <input type="search"  name="editorial_nombre" value="{{old('editorial_nombre')}}" class="form-control" placeholder="Elija la editorial" list="listEditorial">
                                        <datalist id="listEditorial">
                                        @foreach($editoriales as $editorial)
                                           <option value="{{ $editorial->nombre }}">
                                        @endforeach
                                        </datalist>
                                        @error('editorial_nombre')
                                        <span style="color:red">(*) {{ $message }}</span>
                                       @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">ISBN_10</label>
                                    <div class="col-md-9">
                                        <input type="number" id="ibsn_10" name="ibsn_10" value="{{old('ibsn_10')}}" class="form-control" placeholder="Ingrese el isbn_10">
                                        @error('ibsn_10')
                                        <span style="color:red">(*) {{ $message }}</span>
                                       @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">ISBN_13</label>
                                    <div class="col-md-9">
                                        <input type="number" id="ibsn_13" name="ibsn_13" value="{{old('ibsn_13')}}" class="form-control" placeholder="Ingrese el isbn_13">
                                        @error('ibsn_13')
                                        <span style="color:red">(*) {{ $message }}</span>
                                       @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Categoria</label>
                                    <div class="col-md-9">
                                        <input type="search"  name="categoria_nombre" value="{{old('categoria_nombre')}}" class="form-control" placeholder="Elija la categoria" list="listCategoria">
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
                                        <input type="number" step="0.01"  name="precio" value="{{old('precio')}}" class="form-control" placeholder="Ingrese el precio">
                                        @error('precio')
                                        <span style="color:red">(*) {{ $message }}</span>
                                       @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Stock</label>
                                    <div class="col-md-9">
                                        <input type="number"  name="stock" value="{{old('stock')}}" class="form-control" placeholder="Ingrese el stock">
                                        @error('stock')
                                        <span style="color:red">(*) {{ $message }}</span>
                                       @enderror
                                    </div>
                                </div>
                        </div>
                    </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                        </form>
                </div>
                    <!-- /.modal-content -->
</main>
@endsection