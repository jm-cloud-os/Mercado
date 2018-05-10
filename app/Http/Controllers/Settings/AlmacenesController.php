<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Modelos\Almacen;
use App\Http\Requests\Almacenes\StoreAlmacen;

class AlmacenesController extends \App\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $almacenes = Almacen::paginate();
        $data = [
            'almacenes' => $almacenes
        ];
        
        return view('settings.almacenes.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ['almacen' => null];
        return view('settings.almacenes.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlmacen $request)
    {
        $almacen = mapModel(new Almacen(), $request->all());
        array_set($almacen, 'empresa_id', array_get(auth()->user(), 'empresa_id'));
        if($almacen->save()){
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
        $data = ['almacen' => Almacen::findOrFail($id)];
        return view('settings.almacenes.create')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAlmacen $request, $id)
    {
        $almacen = Almacen::findOrFail($id);
        mapModel($almacen, $request->all());
        
        if($almacen->save()){
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
        Almacen::destroy($id);
        return redirect()->back()->with('message', 'Registro borrado correctamente');
    }
    
    public function change(Request $request) {
        session(['almacen' => array_get($request, 'almacen_id')]);
        return redirect()->back();
    }
}
