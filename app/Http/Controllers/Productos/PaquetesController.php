<?php

namespace App\Http\Controllers\Productos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Productos\Producto;
use App\Modelos\Productos\PaqueteProducto;
use App\Http\Requests\Productos\Store;

class PaquetesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'productos' => Producto::where('es_paquete', true)->paginate()
        ];
        
        return view('productos.paquetes.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'producto' => null,
            'action' => 'create',
            'paquete' => true,
            'categorias' => Categoria::all()
        ];
        return view('productos.paquetes.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->setPaqueteContent($request);
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
        
        return view('productos.paquetes.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paquete = Producto::findOrFail($id);
        
        $data = [
            'producto' => $paquete,
            'action' => 'update',
            'paquete' => true,
            'categorias' => Categoria::all()
        ];
        
        return view('productos.paquetes.edit')->with($data);
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
        return $this->setPaqueteContent($request, $id);
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
        return redirect()->route('paquetes.index')->with('message', 'Paquete borrado exitosamente');
    }
    
    public function setPaqueteContent($request, $id = null) {
        if(is_null($id)){
            $paquete = mapModel(new Producto(), $request->all());
            array_set($paquete, 'empresa_id', array_get(auth()->user(), 'empresa_id'));
        }
        else{
            $paquete = Producto::findOrFail($id);
            mapModel($paquete, $request->all());
        }
        
        if( array_get($request, 'disponible_mostrador') === 'on' ){
            array_set($paquete, 'disponible_mostrador', true);
        }
        else{
            array_set($paquete, 'disponible_mostrador', false);
        }
        
        if( array_get($request, 'disponible_web') === 'on' ){
            array_set($paquete, 'disponible_web', true);
        }
        else{
            array_set($paquete, 'disponible_web', false);
        }
        
        is_null($id) ? $paquete->save() : $paquete->update();
        $categorias = json_decode(array_get($request, 'categorias', '[]'));
        $paquete->categorias()->sync($categorias, false);
        try {
            $productos = array_get($request, 'productos');
            $cantidad = array_get($request, 'cantidad');
            $items = [];
            foreach ($productos as $key => $value){
                array_set($items, $value, ['cantidad' => $cantidad[$key]]);
            }
            $paquete->productos()->sync($items);
            return redirect()->route('paquetes.edit', ['id' => array_get($paquete, 'id')])->with('success', 'Paquete creado correctamente');
        } catch (Exception $ex) {
            return redirect()->back()->withInput()->with('error', 'Ocurrio un error al crear el paquete');
        }
        
    }
}
