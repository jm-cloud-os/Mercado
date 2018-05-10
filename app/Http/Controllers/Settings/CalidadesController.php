<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Modelos\Calidad;

class CalidadesController extends \App\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calidades = Calidad::paginate();
        $data = [
            'calidades' => $calidades
        ];
        
        return view('settings.calidad.index')->with($data);
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
    public function store(Request $request)
    {
        $calidad = mapModel(new Calidad(), $request->all());
        if( auth()->user()->empresa->calidades()->save($calidad) ){
            return redirect()->back()->with('message', 'Registro creada correctamente');
        }
        abort(500);
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
        $calidad = Calidad::findOrFail($id);
        mapModel($calidad, $request->all());
        if( $calidad->update() ){
            return redirect()->back()->with('message', 'Registro actualizado correctamente');
        }
        abort(500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Calidad::destroy($id);
        return redirect()->back()->with('message', 'Registro borrado correctamente');
    }
}
