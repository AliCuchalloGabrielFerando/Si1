<?php

namespace App\Http\Controllers;

use App\Editorial;
use Illuminate\Http\Request;
use App\Http\Requests\CargoRequest;

class EditorialesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $editoriales = Editorial::paginate(6);
        return view('editorial.index',['editoriales'=>$editoriales]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('editorial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CargoRequest $request)
    {
        $editoriales = new Editorial();
        $editoriales->nombre = request()->input('nombre');
        $editoriales->save();
        return redirect()->route('editoriales.index');
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
    public function buscar(Request $request)
    {
        $nombre=Request()->input('nombre');
        $editoriales = Editorial::where('nombre','like',"$nombre%")->get();

        return view('editorial.index',['editoriales'=>$editoriales]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editoriales = Editorial::find($id);

        return view('editorial.edit',['editoriales'=>$editoriales]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CargoRequest $request, $id)
    {
        $editoriales = Editorial::find($id);
        $editoriales->nombre = request()->input('nombre');
        $editoriales->save();
        return redirect()->route('editoriales.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $editoriales = Editorial::find($id);
        return redirect()->route('libros.eliminare',['id'=>$editoriales->id]);
       /* $editoriales->delete();
        return redirect()->route('editoriales.index');*/
    }
}
