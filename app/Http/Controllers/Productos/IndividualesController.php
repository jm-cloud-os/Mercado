<?php

namespace App\Http\Controllers\Productos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Productos\Producto;
use App\Http\Requests\Productos\Store;
use App\Modelos\Calidad;

class IndividualesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'productos' => Producto::where('es_paquete', false)->paginate()
        ];
        
        return view('productos.individuales.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $calidades = \App\Statics\Catalogos::calidades(true);
        $data = [
            'producto' => null,
            'action' => 'create',
            'paquete' => false,
            'calidades' => $calidades
        ];
        
        return view('productos.individuales.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $producto = mapModel(new Producto(), $request->all());
        array_set($producto, 'empresa_id', array_get(auth()->user(), 'empresa_id'));
        
        if( array_get($request, 'disponible_mostrador') === 'on' ){
            array_set($producto, 'disponible_mostrador', true);
        }
        else{
            array_set($producto, 'disponible_mostrador', false);
        }
        
        if( array_get($request, 'disponible_web') === 'on' ){
            array_set($producto, 'disponible_web', true);
        }
        else{
            array_set($producto, 'disponible_web', false);
        }
        
        if( $producto->save() ){
            return redirect()->route('productos.edit', ['id' => array_get($producto, 'id')])->with('success', 'Producto creado correctamente');
        }
        
        return redirect()->back()->withInput()->with('error', 'Ocurrio un error al crear el producto');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        $data = [
            'producto' => $producto
        ];
        
        return view('productos.individuales.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $calidades = \App\Statics\Catalogos::calidades(true);
        $data = [
            'producto' => $producto,
            'action' => 'update',
            'paquete' => false,
            'calidades' => $calidades
        ];
        
        return view('productos.individuales.edit')->with($data);
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
        $producto = Producto::findOrFail($id);
        mapModel($producto, $request->all());
        
        if( array_get($request, 'disponible_mostrador', false) === 'on' ){
            array_set($producto, 'disponible_mostrador', true);
        }
        else{
            array_set($producto, 'disponible_mostrador', false);
        }
        
        if( array_get($request, 'disponible_web', false) === 'on' ){
            array_set($producto, 'disponible_web', true);
        }
        else{
            array_set($producto, 'disponible_web', false);
        }
        
        if( $producto->update() ){
            return redirect()->route('productos.edit', ['id' => $id])->with('success', 'Producto actualizado correctamente');
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
        Producto::destroy($id);
        return redirect()->route('productos.index')->with('message', 'Producto borrado exitosamente');
    }
}
