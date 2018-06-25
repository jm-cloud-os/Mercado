<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Cliente;

class ClientesController extends Controller
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
    public function store(Request $request)
    {
        $cliente = mapModel(new Cliente(), $request->all());
        array_set($cliente, 'empresa_id', array_get(auth()->user(), 'empresa_id'));
        $cliente->save();
        if($request->ajax()){
            return response()->json($cliente);
        }
        dd("no ajax");
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

    /**
     * Ajax search
     */
    public function search(Request $request){
        $search = array_get($request, 'query');
        $clientes = Cliente::where('rfc', 'like', "%$search%")
            ->orWhere('email', 'like', "%$search%")
            ->orWhere('nombre', 'like', "%$search%")
            ->get();
            
        
            $result = collect($clientes)->reduce(function($carry, $item) {
                $it['value'] = array_get($item, 'nombre').' ['.array_get($item, 'email').']';
                $it['data'] = $item;
                array_push($carry, $it);
                return $carry;
            }, []);
    
            $data = ['suggestions' => $result];
            return response()->json($data);
    }
}
