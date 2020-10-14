<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Recibo</title>
    <style>
    body{
        padding: 5%;
        font-family: Arial,Helvetica,sans-serif;
    }
    thead{
        background: #eee;
    }
    th,td{
        border: 1px solid #000;
        padding:0.3em;
        text-align: left;
    }
    .tabla{
        width: 100%;
    }
      #cabecera{
          background: darkgray;
          height: 154px;
         line-height:5px;
      }
      #derecha{
         text-align: right; 
         padding-right: 3%;
         padding-top: 2%;
      }
      #izquierda{
         padding-left: 5px;
      }

    </style>
  </head>
  <body >
     <div id="cabecera">
       <div id="derecha">
          <h1 >RECIBO</h1>
          <h4>Recibo #{{$venta->recibo_id}}</h4>
          <h4>Date:  {{$venta->recibo->created_at}} </h4>
        </div>
        <div id="izquierda">
          <h3>Libreria Gama</h3>    
        </div>
    </div>
      <h4>Av. Villa 1ro de Mayo, Santa Cruz - Bolivia<br>71324680<br>LibreriaGama@gmail.com</h4>
      <strong>Datos del Cliente</strong>
      
      <h5>Carnet Identidad: &nbsp;&nbsp;&nbsp;&nbsp;{{$venta->cliente->carnet_identidad}}<br>
          Nombre Completo: &nbsp;&nbsp;{{$venta->cliente->nombre.' '.$venta->cliente->apellido_paterno.' '.$venta->cliente->apellido_materno}}</h5>
    
  <table class="tabla" >
        <thead >
             <tr>
                <th>Libro</th>
                <th>Precio Unitario</th>
                <th>Cantidad</th>
                <th>Precio Total</th>
             </tr>
        </thead>
            <tbody>
            @foreach($venta->detalle_ventas as $detalle)
               <tr>
                  <td>{{$detalle->libro->titulo}}&nbsp;&nbsp;<b>Autores: </b>
                  @foreach($detalle->libro->detalle_autores as $autor)
                    {{$autor->autor->nombre_completo}}
                  @endforeach
                  </td>
                  <td>{{$detalle->precio_unitario}} .Bs</td>
                  <td>{{$detalle->cantidad}} .unid</td>
                  <td>{{$detalle->precio}} .Bs</td>
              </tr>
            @endforeach           
            </tbody>
        </table>
  <div id="derecha">
     <h3>Monto de Venta &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bs. &nbsp;&nbsp;&nbsp; {{$venta->monto_venta}}</h3>
     <h3>Monto de Descuento &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bs. &nbsp;&nbsp;&nbsp; {{$venta->monto_descuento}}</h3>
     <h3>Total a Pagar &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bs. &nbsp;&nbsp;&nbsp; {{$venta->monto_total}}</h3>
  </div>
  </body>
<html>