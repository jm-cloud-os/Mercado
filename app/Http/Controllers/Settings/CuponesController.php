<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Modelos\Cupon;
use Carbon\Carbon;

class CuponesController extends \App\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $series = Cupon::select('serie')->groupBy('serie')->paginate();
        $data = ['series' => $series];
        return view('settings.cupones.index')->with($data);
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
        $total = array_get($request, 'cantidad', 0);
        for($i = 1; $i <= $total; $i++){
            $cupon = mapModel(new Cupon(), $request->all());
            array_set($cupon, 'empresa_id', array_get(auth()->user(), 'empresa_id'));
            array_set($cupon, 'codigo', strtoupper(str_random(10)));
            $cupon->save();
        }
        return redirect()->back()->with('message', "Se crearon $total cupones nuevos");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cupones = Cupon::where('serie', $id)->paginate();
        $serie = Cupon::where('serie', $id)->first();
        $data = [
            'cupones' => $cupones,
            'serie' => $serie
        ];
        return view('settings.cupones.show')->with($data);
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
    public function destroy($id, Request $request)
    {
        $delete = array_get($request, 'delete');

        if($delete == 'serie'){
            Cupon::where('serie', $id)->update(['deleted_at' => Carbon::now()]);
            return redirect()->route('cupones.index')->with('message', 'Serie eliminada correctamente');
        }

        if($delete == 'cupon'){
            Cupon::destroy($id);
            return redirect()->back()->with('message', 'Cup&oacute;n eliminado correctamente');
        }
    }
}
