<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Averia;
use App\Empresa;

class AveriaController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $averias = Averia::whereNull('fecha_baja_averia')->with('empresa')->get();
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
        $request = request()->except('_token','_method');
		Averia::create([
            'id_empresa' => $request['id_empresa'],
            'estatus_averia' => $request['estatus_averia'],
			'descripcion_averia' => $request['descripcion_averia'],
			'fecha_alta_averia' => date("Y/m/d"),
		]);
		
        $averias = Averia::whereNull('fecha_baja_averia')->with('empresa')->get();
        return redirect()->route('averia.index', compact('averias'))
			->with('status','La averia se ha creado con éxito');
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
        $empresas = Empresa::whereNull('fecha_baja_empresa')->get();
		$averia = Averia::find($id)->first();
        return view('averia.edit', compact('averia'), compact('empresas'));
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
        $request = request()->except('_token','_method');

		Averia::where('id_averia', $id)->update([
			'id_empresa' => $request['id_empresa'],
			'descripcion_averia' => $request['descripcion_averia'],
			'estatus_averia' => $request['estatus_averia'],
			'fecha_modificacion_averia' => date("Y/m/d"),
		]);
		
		$averias = Averia::whereNull('fecha_baja_averia');
		return redirect()->route('averia.index',compact('averias'))
			->with('status','La averia se ha actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		Averia::where('id_averia', $id)->update([
			'fecha_baja_averia' => date("Y/m/d"),
		]);
		
        $averias = Averia::whereNull('fecha_baja_averia')->with('empresa')->get();
        return redirect()->route('averia.index', compact('averias'))
			->with('status','La averia se ha eliminado con éxito');
    }
}
