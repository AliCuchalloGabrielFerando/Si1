@extends('layout.header1')
@section('content')
<main class="main">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Agregar Compra</h4>
                        </div>
                        <div class="modal-body">
        
                            <form action="{{ route('compras.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input type="search"  name="proveedor_nombre" value="{{old('proveedor_nombre')}}" class="form-control" placeholder="Elija proveedor" list="listProveedor">
                                        <datalist id="listProveedor">
                                        @foreach($proveedores as $proveedor)
                                           <option value="{{ $proveedor->nombre }}">
                                        @endforeach
                                        </datalist>
                                        @error('proveedor_nombre')
                                        <span style="color:red"> {{ $message }}</span>
                                       @enderror
                                    </div>
                                </div>
                        </div>
                    </div>
                             <div class="modal-footer">
                            <a href="{{ route('compras.index') }}" class="btn btn-secondary" data-dismiss="modal">Atras</a>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                            </form>
</main>
@endsection