<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Modelos\Canal;

class CanalesController extends \App\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $canales = Canal::paginate();
        $data = [
            'canales' => $canales
        ];
        
        return view('settings.canales.index')->with($data);
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
        $canal = mapModel(new Canal(), $request->all());
        
        if(auth()->user()->empresa->canales()->save($canal)){
            return redirect()->back()->with('message', 'Registro creado correctamente');
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
        $canal = Canal::findOrFail($id);
        mapModel($canal, $request->all());
        if($canal->update()){
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
        Canal::destroy($id);
        return redirect()->back()->with('message', 'Registro borrado correctamente');
    }
}
