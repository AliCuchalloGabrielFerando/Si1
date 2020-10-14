@extends('layout.header1')
@section('content')
<main class="main">
        
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Reportes
                    </div>
                    <div class="card-body">
                    <form action="{{route('recibos.buscarReporte')}}" method="GET">  
                        <div class="form-group row">
                                 <div class="col-md-7">
                                     <div class="input-group">
                                        <input type="text" id="texto" name="texto" class="form-control" placeholder="Fecha a buscar - Ejemplo(2020-09-01)">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                     </div>
                                 </div>
                         </div>
                         </form>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Nro</th>
                                    <th>Fecha de venta</th>
                                    <th>Monto de total</th>
                                    <th>Monto de descuento</th>
                                    <th>Monto de venta</th>
                                    <th>Empleado</th>
                                    <th>NroRecibo</th>
                                    <th>Monto de recibo</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($ventas as $venta)
                                <tr>
                                    <td>{{$venta->id}}</td>
                                    <td>{{$venta->created_at}}</td>
                                    <td>{{$venta->monto_total}}</td>
                                    <td>{{$venta->monto_descuento}}</td>
                                    <td>{{$venta->monto_venta}}</td>
                                    <td>{{$venta->empleado->nombre.' '.$venta->empleado->apellido_paterno.' '.$venta->empleado->apellido_materno}}</td>
                                    <td>{{$venta->recibo_id}}</td>
                                    @if($venta->recibo_id > 0)
                                    <td>{{$venta->recibo->monto}}</td>
                                    @else
                                    <td></td>
                                    @endif
                                    <td>
                                        <a href="{{route('ventas.show',[$venta->id])}}"><span class="btn btn-warning btn-sm" data-badge-caption=""><i class="icon-info"></i></span></a>
                                   </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <center>
                    <label><h5><Strong>Monto total de Ventas : {{$total_venta}} .Bs</strong></h5></label><br>
                    <label><h5><Strong>Monto total de Recibos : {{$total}} .Bs</strong></h5></label></br>
                    <label><h5><Strong>Monto total de Descuentos : {{$descuento}} .Bs</strong></h5></label>
                    </center>
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>
        </main>
@endsection