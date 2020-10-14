<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detalle_Autor;
use App\Autor;
class DetalleAutoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $libro_id)
    {
        $autor= Autor::where('nombre_completo',$request->input('autor_nombre'))->get();
        if(sizeof($autor)== 0 ){
            return redirect()->route('autores.create');
        }
        try{
        $detalle_autor = new Detalle_Autor();
        $detalle_autor->libro_id = $libro_id;
        $autor= $autor[0];
        $detalle_autor->autor_id = $autor->id;
        $detalle_autor->save();
        return redirect()->route('libros.edit',[$libro_id]);
       }catch(\Illuminate\Database\QueryException $e){return back();}
        
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $autor_id)
    {
        Detalle_Autor::where(['libro_id'=>$id,'autor_id'=>$autor_id])->delete();
        return redirect()->route('libros.edit',$id);
    }
}
