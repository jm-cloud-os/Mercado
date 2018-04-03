<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Productos\Producto;
use App\Modelos\Ventas\VentaMaestro;
use App\Modelos\Ventas\VentaDetalle;
use Carbon\Carbon;

class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        return view('ventas.index')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $productos = array_get($request, 'id');
        $cantidades = array_get($request, 'cantidad');
        
        $venta = mapModel(new VentaMaestro(), $request->all());
        array_set($venta, 'user_id', array_get(auth()->user(), 'id'));
        array_set($venta, 'status', 'venta');
        array_set($venta, 'payed_at', Carbon::now());
        auth()->user()->empresa->ventas()->save($venta);
        
        foreach ($productos as $key => $value){
            $producto = Producto::findOrFail($value);
            if( array_get($producto, 'es_paquete') ){
                foreach (array_get($producto, 'productos') as $item){
                    $cantidad = $cantidades[$key] *  array_get($item, 'pivot.cantidad');
                    $detalle = [
                        'empresa_id' => array_get(auth()->user(), 'empresa.id'),
                        'producto_id' => array_get($item, 'id'),
                        'nombre_producto' => array_get($item, 'nombre_es'),
                        'cantidad' =>$cantidad,
                        'precio' => array_get($item, 'precio_paquete'),
                        'paquete_id' => array_get($producto, 'id'),
                        'nombre_paquete' => array_get($producto, 'nombre_es'),
                        'en_paquete' => true,
                        'cantidad_paquetes' => $cantidades[$key]
                    ];
                    $this->storeVentaProducto($venta, $detalle);
                }
                $detalle = ['producto_id' => array_get($producto, 'id'), 'cantidad' => $cantidades[$key]];
                $this->updateDisponibilidad($detalle);
            }
            else{
                $detalle = [
                    'empresa_id' => array_get(auth()->user(), 'empresa.id'),
                    'producto_id' => array_get($producto, 'id'),
                    'nombre_producto' => array_get($producto, 'nombre_es'),
                    'cantidad' => $cantidades[$key],
                    'precio' => array_get($producto, 'precio_individual')
                ];
                $this->storeVentaProducto($venta, $detalle);
            }
        }
        return redirect()->route('ventas.create')->with('message', 'Venta realizada exitosamente');
    }
    
    public function storeVentaProducto($venta, $detalle) {
        $ventaDetalle = mapModel(new VentaDetalle(), $detalle);
        $venta->productos()->save($ventaDetalle);
        $this->updateDisponibilidad($ventaDetalle);
    }
    
    public function updateDisponibilidad($ventaDetalle) {
        $producto = Producto::findOrFail(array_get($ventaDetalle, 'producto_id'));
        $disponibles = array_get($producto, 'disponibilidad', 0);
        $vendidos = array_get($ventaDetalle, 'cantidad', 0);
        $update = $disponibles - $vendidos;
        array_set($producto, 'disponibilidad', $update);
        $producto->update();
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
    public function destroy($id)
    {
        //
    }
}