<?php

use App\Estado;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('home');
})->name('casa');


Route::get('/','PagesController@home')->name('casa');


Route::get('contactanos','PagesController@contactanos')->name('contacto');

Route::get('saludos/{nombre?}', function($nombre = "Invitado") {
    $mensaje = "<script> alert('hola soy adm') </script>"; 
    $arreglo = ["hace frio", "mucho frio" , "ya paso"];
    return view('saludos', ['nombre'=>$nombre , 'mensaje'=>$mensaje , 'arreglo'=>$arreglo]);
})->name('saludo')->where('nombre',"[A-Za-z]+");

Route::post('enviar','PagesController@enviar')->name('enviar');*/
Route::get('/prueba',function(){

$cargo=new App\Cargo();
$cargo->nombre="Administrador";
$cargo->save();
$estado = new Estado();
$estado->nombre="estable";
$estado->save();
$empleado = new App\Empleado();
$empleado->carnet_identidad ="786535425";
$empleado->nombre="root";
$empleado->apellido_paterno="Mercedez";
$empleado->apellido_materno="Gomez";
$empleado->telefono="723434";
$empleado->cargo_id=$cargo->id;
$empleado->estado_id=$estado->id;
$empleado->save();

$user=new App\User();
$user->email='root@root.com';
$user->password=bcrypt('1234');
$user->empleado_id=$empleado->id;
$user->save();
});

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout','Auth\LoginController@logout')->name('logout');

Route::middleware(['auth'])->group(function(){

Route::middleware(['administrador'])->group(function(){

Route::group(['prefix'=>'cargos'],function(){
    Route::get('/', 'CargosController@index')->name('cargos.index');
    Route::get('/create', 'CargosController@create')->name('cargos.create');
    Route::post('/', 'CargosController@store')->name('cargos.store');
    Route::get('/edit/{id}', 'CargosController@edit')->name('cargos.edit');
    Route::put('/{id}', 'CargosController@update')->name('cargos.update');
    Route::get('/buscar', 'EstadosController@buscar')->name('cargos.buscar');
});
Route::group(['prefix'=>'empleados'],function(){
    Route::get('/', 'EmpleadosController@index')->name('empleados.index');
    Route::get('/create', 'EmpleadosController@create')->name('empleados.create');
    Route::post('/', 'EmpleadosController@store')->name('empleados.store');
    Route::get('/edit/{id}', 'EmpleadosController@edit')->name('empleados.edit');
    Route::put('/{id}', 'EmpleadosController@update')->name('empleados.update');
    Route::get('/buscar', 'EmpleadosController@buscar')->name('empleados.buscar');
});
Route::group(['prefix'=>'estados'],function(){
    Route::get('/', 'EstadosController@index')->name('estados.index');
    Route::get('/create', 'EstadosController@create')->name('estados.create');
    Route::post('/', 'EstadosController@store')->name('estados.store');
    Route::get('/edit/{id}', 'EstadosController@edit')->name('estados.edit');
    Route::put('/{id}', 'EstadosController@update')->name('estados.update');
    Route::delete('/{id}', 'EstadosController@destroy')->name('estados.destroy');
    Route::get('/buscar', 'EstadosController@buscar')->name('estados.buscar');
});
Route::group(['prefix'=>'usuarios'],function(){
    Route::get('/', 'UsuariosController@index')->name('usuarios.index');
    Route::get('/create', 'UsuariosController@create')->name('usuarios.create');
    Route::post('/', 'UsuariosController@store')->name('usuarios.store');
    Route::get('/edit/{id}', 'UsuariosController@edit')->name('usuarios.edit');
    Route::put('/{id}', 'UsuariosController@update')->name('usuarios.update');
    Route::get('/{id}/destroy','UsuariosController@destroy')->name('usuarios.destroy');
});

Route::group(['prefix'=>'editoriales'],function(){
    Route::get('/create', 'EditorialesController@create')->name('editoriales.create');
    Route::post('/', 'EditorialesController@store')->name('editoriales.store');
    Route::get('/edit/{id}', 'EditorialesController@edit')->name('editoriales.edit');
    Route::put('/{id}', 'EditorialesController@update')->name('editoriales.update');
    Route::delete('/{id}', 'EditorialesController@destroy')->name('editoriales.destroy');
});
Route::group(['prefix'=>'categorias'],function(){
    Route::get('/create', 'CategoriasController@create')->name('categorias.create');
    Route::post('/', 'CategoriasController@store')->name('categorias.store');
    Route::get('/edit/{id}', 'CategoriasController@edit')->name('categorias.edit');
    Route::put('/{id}', 'CategoriasController@update')->name('categorias.update');
});
Route::group(['prefix'=>'autores'],function(){
    Route::get('/create', 'AutoresController@create')->name('autores.create');
    Route::post('/', 'AutoresController@store')->name('autores.store');
    Route::get('/edit/{id}', 'AutoresController@edit')->name('autores.edit');
    Route::put('/{id}', 'AutoresController@update')->name('autores.update');
});
Route::group(['prefix'=>'detallesAutores'],function(){
    Route::get('/', 'DetalleAutoresController@index')->name('detallesAutores.index');
    Route::get('/create', 'DetalleAutoresController@create')->name('detallesAutores.create');
    Route::post('/{id}', 'DetalleAutoresController@store')->name('detallesAutores.store');
    Route::get('/edit/{id}', 'DetalleAutoresController@edit')->name('detallesAutores.edit');
    Route::put('/{id}', 'DetalleAutoresController@update')->name('detallesAutores.update');
    Route::get('/{id}/{autor_id}/destroy','DetalleAutoresController@destroy')->name('detallesAutores.destroy');
});
    Route::get('libros/create', 'LibrosController@create')->name('libros.create');
    Route::post('libros/', 'LibrosController@store')->name('libros.store');
    Route::get('libros/edit/{id}', 'LibrosController@edit')->name('libros.edit');
    Route::put('libros/{id}', 'LibrosController@update')->name('libros.update');

    Route::group(['prefix'=>'recibos'],function(){
        Route::get('/', 'RecibosController@index')->name('recibos.index');
        Route::get('/{id}', 'RecibosController@store')->name('recibos.store');
        Route::get('/show/{id}','RecibosController@show')->name('recibos.show');
        Route::get('/{id}/destroy','RecibosController@destroy')->name('recibos.destroy');
        Route::get('/reportes/venta', 'RecibosController@reporte')->name('recibos.reporte');
        Route::get('/buscar/reporte/venta', 'RecibosController@buscarReporte')->name('recibos.buscarReporte');
        Route::get('/ventas/total', 'RecibosController@sumTotalVentas')->name('sumTotalVentas');
    });

    Route::group(['prefix'=>'proveedores'],function(){
        Route::get('/', 'ProveedoresController@index')->name('proveedores.index');
        Route::get('/create', 'ProveedoresController@create')->name('proveedores.create');
        Route::post('/', 'ProveedoresController@store')->name('proveedores.store');
        Route::get('/edit/{id}', 'ProveedoresController@edit')->name('proveedores.edit');
        Route::put('/{id}', 'ProveedoresController@update')->name('proveedores.update');
        Route::delete('/{id}', 'ProveedoresController@destroy')->name('proveedores.destroy');
        Route::get('/buscar', 'ProveedoresController@buscar')->name('proveedores.buscar');
    });

    Route::group(['prefix'=>'compras'],function(){
        Route::get('/', 'ComprasController@index')->name('compras.index');
        Route::get('/create', 'ComprasController@create')->name('compras.create');
        Route::post('/', 'ComprasController@store')->name('compras.store');
        Route::get('/{id}','ComprasController@show')->name('compras.show');
        Route::get('/edit/{id}', 'ComprasController@edit')->name('compras.edit');
        Route::put('/{id}', 'ComprasController@update')->name('compras.update');
        Route::get('/{id}/destroy','ComprasController@destroy')->name('compras.destroy');
        Route::get('/bP/proveedor', 'ComprasController@buscarCliente')->name('compras.buscarProveedor');
    });
    Route::group(['prefix'=>'detallesCompras'],function(){
        Route::get('/create/{compra_id}', 'DetalleComprasController@create')->name('detallescompras.create');
        Route::post('/{compra_id}', 'DetalleComprasController@store')->name('detallescompras.store');
        Route::get('/{id}/destroy/{compra_id}','DetalleComprasController@destroy')->name('detallescompras.destroy');
        Route::get('/bL/libro/{id}', 'DetalleComprasController@buscarLibro')->name('detallescompras.buscarLibro');
    });

});

Route::group(['prefix'=>'clientes'],function(){
    Route::get('/', 'ClientesController@index')->name('clientes.index');
    Route::get('/create', 'ClientesController@create')->name('clientes.create');
    Route::post('/', 'ClientesController@store')->name('clientes.store');
    Route::get('/edit/{id}', 'ClientesController@edit')->name('clientes.edit');
    Route::put('/{id}', 'ClientesController@update')->name('clientes.update');
    Route::get('/buscar', 'ClientesController@buscar')->name('clientes.buscar');
});

Route::get('editoriales/', 'EditorialesController@index')->name('editoriales.index');
Route::get('editoriales/buscar', 'EditorialesController@buscar')->name('editoriales.buscar');

Route::get('categorias/', 'CategoriasController@index')->name('categorias.index');
Route::get('categorias/buscar', 'CategoriasController@buscar')->name('categorias.buscar');

Route::get('autores/', 'AutoresController@index')->name('autores.index');
Route::get('autores/buscar', 'AutoresController@buscar')->name('autores.buscar');

Route::get('usuarios/perfil/{id}', 'UsuariosController@perfil')->name('usuarios.perfil');
Route::put('usuarios/perfil/{id}', 'UsuariosController@cambiarContraseña')->name('usuarios.cambiarContraseña');

Route::group(['prefix'=>'libros'],function(){
    Route::get('/', 'LibrosController@index')->name('libros.index');
    Route::get('/buscar', 'LibrosController@buscar')->name('libros.buscar');
});
Route::group(['prefix'=>'ventas'],function(){
    Route::get('/', 'VentasController@index')->name('ventas.index');
    Route::get('/create', 'VentasController@create')->name('ventas.create');
    Route::post('/', 'VentasController@store')->name('ventas.store');
    Route::get('/{id}','VentasController@show')->name('ventas.show');
    Route::get('/edit/{id}', 'VentasController@edit')->name('ventas.edit');
    Route::put('/{id}', 'VentasController@update')->name('ventas.update');
    Route::get('/{id}/destroy','VentasController@destroy')->name('ventas.destroy');
    Route::get('/bC/cliente', 'VentasController@buscarCliente')->name('ventas.buscarCliente');
});
Route::group(['prefix'=>'detallesVentas'],function(){
    Route::get('/create/{venta_id}', 'DetallesVentasController@create')->name('detallesVentas.create');
    Route::post('/{id}', 'DetallesVentasController@store')->name('detallesVentas.store');
    Route::get('/{id}/destroy','DetallesVentasController@destroy')->name('detallesVentas.destroy');
    Route::get('/bL/libro/{id}', 'DetallesVentasController@buscarLibro')->name('detallesVentas.buscarLibro');
});
});
