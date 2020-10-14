<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="utf-8">
    <title>Librería Gama</title>
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/simple-line-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  </head>
  <body >
<div class="head">
    <div class="navBtn">
      <span class="fas fa-bars"></span>
    </div>
    <div class="rigth_area">
    <a href="{{route('usuarios.perfil',[auth()->user()->id])}}" style=text-decoration:none><span class="icon-color"><i class="icon-user"></span></i> &nbsp;{{auth()->user()->empleado->nombre }} {{auth()->user()->empleado->apellido_paterno}} {{auth()->user()->empleado->apellido_materno}}</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="{{route('logout')}}" style=text-decoration:none ><span class="icon-color"><i class="icon-logout"></span></i> &nbsp;cerrar sesión</a>
    </div>
</div>
<nav class="sidebar">
      <div class="text">
</div>
<ul>
<center>
<h3>MENU</h3>
</center>
@if (Auth::user()->empleado->cargo->nombre == 'Administrador')
<li>
          <a href="#" class="feat-btn">Personal
            <span class="fas fa-caret-down first"></span>
          </a>
          <ul class="feat-show">
              <li><a href="{{ route('cargos.index') }}">Cargos</a></li>
              <li><a href="{{ route('empleados.index') }}">Empleados</a></li>
              <li><a href="{{ route('usuarios.index') }}">Usuarios</a></li>
          </ul>
</li>
@endif
@if (Auth::user()->empleado->cargo->nombre == 'Cajero' ||Auth::user()->empleado->cargo->nombre == 'Administrador')
<li>
          <a href="#" class="serv-btn">Libros
            <span class="fas fa-caret-down second"></span>
          </a>
          <ul class="serv-show">
          <li><a href="{{ route('categorias.index') }}">Categorias</a></li>
          <li><a href="{{ route('editoriales.index') }}">Editoriales</a></li>
          <li><a href="{{ route('autores.index') }}">Autores</a></li>
          <li><a href="{{ route('libros.index') }}">Libros</a></li>
          </ul>
</li>
<li>
          <a href="#" class="carg-btn">Ventas
            <span class="fas fa-caret-down thirth"></span>
          </a>
          <ul class="carg-show">
              <li><a href="{{ route('clientes.index') }}">Clientes</a></li>
              <li><a href="{{ route('ventas.index') }}">Ventas</a></li>
          </ul>
</li>
@endif
@if (Auth::user()->empleado->cargo->nombre == 'Administrador')
<li>
          <a href="#" class="comp-btn">Compras
            <span class="fas fa-caret-down fith"></span>
          </a>
          <ul class="comp-show">
             <li><a href="{{ route('proveedores.index') }}">Proveedores</a></li>
             <li><a href="{{ route('compras.index') }}">Compras</a></li>
          </ul>
</li>
<li>
          <a href="#" class="lib-btn">Reportes
            <span class="fas fa-caret-down fourth"></span>
          </a>
          <ul class="lib-show">
              <li><a href="{{route('recibos.index')}}">Recibos</a></li>
              <li><a href="{{route('recibos.reporte')}}">Ventas</a></li>
              <li><a href="{{route('sumTotalVentas')}}">Balance</a></li>
          </ul>
</li>
@endif
</ul>
</nav>
<div class="content">     
@yield('content')
</div>
<script src="{{ asset('js/jquery341.js') }}"></script>
<script src="{{ asset('js/a076d05399.js') }}"></script>
<script src="{{ asset('js/nav.js') }}"></script>
     
  </body>
</html>
