<?php

namespace App\Http\Controllers;

use App\Libro;
use App\Editorial;
use App\Tema;
use App\Autor;
use App\Detalle_Autor;
use Illuminate\Http\Request;
use App\Http\Requests\LibroRequest;

class LibrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros=Libro::paginate(6);
        return view('libro.index',['libros'=>$libros]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $editoriales = Editorial::all();
        $categorias = Tema::all();
        return view('libro.create',['editoriales'=>$editoriales, 'categorias'=>$categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LibroRequest $request)
    {  
        $editorial_id = Editorial::where('nombre',$request->input('editorial_nombre'))->get();
        if(sizeof($editorial_id)== 0 ){
        return redirect()->route('editoriales.create');
        }
        $categoria_id = Tema::where('nombre',$request->input('categoria_nombre'))->get();
        if(sizeof($categoria_id) == 0){
         return redirect()->route('categorias.create');
        }
        $libro = new Libro();
        $libro->titulo = $request->input('titulo');
        $libro->precio = $request->input('precio');
        $libro->edicion = $request->input('edicion');
        $libro->edicion_año = $request->input('edicion_año');
        $libro->ibsn_10 = $request->input('isbn_10');
        $libro->isbn_13 = $request->input('ibsn_13');
        $libro->precio = $request->input('precio');
        $libro->stock = $request->input('stock');
        $editorial_id = $editorial_id[0];
        $libro->editorial_id = $editorial_id->id;
        $categoria_id = $categoria_id[0];
        $libro->categoria_id = $categoria_id->id;
        $libro->save();
        return redirect()->route('libros.edit',[$libro->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editoriales = Editorial::all();
        $categorias = Tema::all();
        $autores = Autor::all();
        $libro = Libro::findOrFail($id);
        return view('libro.edit',['libro'=>$libro,'editoriales'=>$editoriales,'categorias'=>$categorias,'autores'=>$autores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LibroRequest $request, $id)
    {
        $editorial_id = Editorial::where('nombre',$request->input('editorial_nombre'))->get();
        if(sizeof($editorial_id)== 0 ){
        return redirect()->route('editoriales.create');
        }
        $categoria_id = Tema::where('nombre',$request->input('categoria_nombre'))->get();
        if(sizeof($categoria_id) == 0){
         return redirect()->route('categorias.create');
        }
        $libro = Libro::findOrFail($id);
        $libro->titulo = $request->input('titulo');
        $libro->precio = $request->input('precio');
        $libro->edicion = $request->input('edicion');
        $libro->edicion_año = $request->input('edicion_año');
        $libro->ibsn_10 = $request->input('isbn_10');
        $libro->isbn_13 = $request->input('ibsn_13');
        $libro->precio = $request->input('precio');
        $libro->stock = $request->input('stock');
        $editorial_id = $editorial_id[0];
        $libro->editorial_id = $editorial_id->id;
        $categoria_id = $categoria_id[0];
        $libro->categoria_id = $categoria_id->id;
        $libro->save();
        return redirect()->route('libros.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
   
    public function buscar(Request $request){
        $nombre=$request->input('texto');
        if($request->input('opcion')==1){
            $libros=Libro::where('titulo','like',"$nombre%")
                           ->get();
          }
          if($request->input('opcion')==2){
            $libros = Libro::join('detalle__autors','libros.id','=','detalle__autors.libro_id')
                          ->join('autores','detalle__autors.autor_id','=','autores.id')
                          ->where('autores.nombre_completo','like',"$nombre%")
                          ->get();
          }
          if($request->input('opcion')==3){
            $libros=Libro::join('temas','libros.categoria_id','=','temas.id')
                           ->where('temas.nombre','like',"$nombre%")
                           ->get();
          }
        return view('libro.index',['libros'=>$libros]);
    }

}
