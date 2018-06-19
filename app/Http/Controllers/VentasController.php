<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Productos\Producto;
use App\Modelos\Ventas\VentaMaestro;
use App\Modelos\Ventas\VentaDetalle;
use Carbon\Carbon;
use App\Statics\Catalogos;
use App\Modelos\Almacen;
use App\Modelos\Canal;

class VentasController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $data = [
            'almacenes' => Catalogos::almacenes(true),
            'almacen' => Almacen::find(session('almacen')),
            'canales' => Catalogos::canales(true),
            'canal' => Almacen::find(session('almacen'))
        ];
        return view('ventas.index')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        
        $productos = array_get($request, 'id');
        $cantidades = array_get($request, 'cantidad');
        
        $canal = Canal::where('nombre', array_get($request, 'canal', 'mostrador'))->first();
        if(is_null($canal)){
            $canal = new Canal();
            array_set($canal, 'empresa_id', array_get(auth()->user(), 'empresa.id'));
            array_set($canal, 'nombre', array_get($request, 'canal', 'mostrador'));
            $canal->save();
        }

        $venta = mapModel(new VentaMaestro(), $request->except('forma_pago'));
        array_set($venta, 'user_id', array_get(auth()->user(), 'id'));
        array_set($venta, 'status', 'venta');
        array_set($venta, 'payed_at', Carbon::now());
        array_set($venta, 'almacen_id', session('almacen'));
        array_set($venta, 'canal_id', array_get($canal, 'id'));
        auth()->user()->empresa->ventas()->save($venta);

        $total = array_get($venta, 'total', 0);
        
        $pagos = json_decode(array_get($request, 'forma_pago', '[]'), true);
        foreach ($pagos as $pago){
            if(array_get($pago, 'valor') > 0){
                if(array_get($pago, 'forma') == 'DESCUENTO'){
                    $total = $total - array_get($pago, 'valor', 0);
                    array_set($venta, 'total', $total);
                    $venta->update();
                }
                $forma = new \App\Modelos\FormaPago();
                array_set($forma, 'forma', array_get($pago, 'forma'));
                array_set($forma, 'cantidad', array_get($pago, 'valor'));
                array_set($forma, 'venta_maestro_id', array_get($venta, 'id'));
                $forma->save();
            }
        }
        
        foreach ($productos as $key => $value) {
            $producto = Producto::findOrFail($value);
            if (array_get($producto, 'es_paquete')) {
                foreach (array_get($producto, 'productos') as $item) {
                    $cantidad = $cantidades[$key] * array_get($item, 'pivot.cantidad');
                    $detalle = [
                        'empresa_id' => array_get(auth()->user(), 'empresa.id'),
                        'producto_id' => array_get($item, 'id'),
                        'nombre_producto' => array_get($item, 'nombre_es'),
                        'cantidad' => $cantidad,
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
            } else {
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
        $inventario = array_get($producto, 'inventario');
        if (!is_null($inventario)) {
            $disponibles = array_get($inventario, 'cantidad', 0);
            $vendidos = array_get($ventaDetalle, 'cantidad', 0);
            $update = $disponibles - $vendidos;
            array_set($inventario, 'cantidad', $update);
            $inventario->update();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
    
    public function change(Request $request) {
        session(['almacen' => array_get($request, 'almacen_id')]);
        session(['canal' => array_get($request, 'canal_id')]);
        return redirect()->back();
    }

}
