@extends('layout.header1')
@section('content')
<main class="main">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Agregar Libro de Compra</h4>
                        </div>
                        <div class="modal-body">
                          
                            <form action="{{ route('detallescompras.store',$compra->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="email-input">Libro</label>
                                    <div class="col-md-9">
                                        <input type="search"  name="libro_nombre" value="{{old('libro_nombre')}}" class="form-control" placeholder="Elija Libro" list="listLibro">
                                        <datalist id="listLibro">
                                        @foreach($libros as $libro)
                                           <option value="{{ $libro->titulo}}"> </option>
                                        </datalist>
                                        @error('libro_nombre')
                                        <span style="color:red">(*) {{ $message }}</span>
                                       @enderror
                              
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="email-input">Cantidad</label>
                                    <div class="col-md-9">
                                     <input type="number" class="form-control" name="cantidad" placeholder="Ingrese la cantidad">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="email-input">Costo Unitario</label>
                                    <div class="col-md-9">
                                     <input type="number" class="form-control" name="precio_unitario" placeholder="Ingrese el costo unitario">
                                    </div>
                                </div>
                                </br>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
</main>
@endsection