<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Productos\Producto;
use App\Modelos\Inventario;

class ProductosController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $search = array_get($request, 'query');
        $builder = Producto::where(function($query) use($search) {
                    $query->where('clave', 'like', "%$search%")->orWhere('nombre_es', 'like', "%$search%");
                });
                /*
        $q = array_get($request, 'q');
        switch ($q) {
            case 'paquetes':
                $builder->where('es_paquete', true);
                break;
            case 'individuales':
                $builder->where('es_paquete', false);
                break;
            default :
                break;
        }
                 * 
                 */

        $productos = $builder->get();
        $result = collect($productos)->reduce(function($carry, $item) {
            $it['value'] = array_get($item, 'nombre_es');
            $it['data'] = $item;
            array_push($carry, $it);
            return $carry;
        }, []);

        $data = ['suggestions' => $result];
        return response()->json($data);
    }

    public function ventas(Request $request) {
        $search = array_get($request, 'query');
        $q = array_get($request, 'q');

        $builder = Inventario::whereHas('productos', function($query) use($search, $q) {
                    $query->where('clave', 'like', "%$search%")
                            ->orWhere('nombre_es', 'like', "%$search%")
                            ->orWhere('nombre_en', 'like', "%$search%");
/*
                    switch ($q) {
                        case 'paquetes':
                            $query->where('es_paquete', true);
                            break;
                        case 'individuales':
                            $query->where('es_paquete', false);
                            break;
                        default :
                            break;
                    }
 * 
 */
                })->where('almacen_id', session('almacen'));

        $productos = $builder->get();
        $result = collect($productos)->reduce(function($carry, $item) {
            $it['value'] = array_get($item, 'producto.nombre_es');
            $it['data'] = array_get($item, 'producto');
            array_push($carry, $it);
            return $carry;
        }, []);

        $data = ['suggestions' => $result];
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
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

}
