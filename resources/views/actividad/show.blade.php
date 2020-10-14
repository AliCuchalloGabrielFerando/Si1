@extends('layout.header')
@section('content')
<main class="main">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"> Ventas y Compras</h4>
                        </div>
                        <div class="modal-body">
                          <center>
                            <h4 style="color:blue">Total de Dinero en Ventas : </h4>
                            <label></label>
                            <h4 style="color:red">Total de Dinero en Compras : </h4>
                            <label></label>
                            <h4>-----------------------</h4>
                            <h4 style="color:gray">Ventas - Compras : </h4>
                            <label></label>
                          </center>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
</main>
@endsection