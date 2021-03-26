<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Averia;
use App\Empresa;
use Carbon\Carbon;

class AveriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $averias = Averia::whereNull('fecha_baja_averia')->get();
		return view("averia.index", compact('averias'));
    	
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$empresas = Empresa::whereNull('fecha_baja_empresa')->get();
        return view('averia.create', compact('empresas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
		$averia=Averia::find($id);
        return view('averia.create', compact('averia'));
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
		Empresa::where('id_averia', $id)->update([
			'fecha_baja_averia' => Carbon::now()->format('Y-m-d'),
		]);
		
		$averias = Averia::whereNull('fecha_baja_averia')->get();
        return redirect()->route('averia.index', compact('averias'));
    }
}
