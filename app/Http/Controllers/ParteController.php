<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parte;
use App\Averia;
use App\Usuario;

class ParteController extends Controller
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
        $partes = Parte::whereNull('fecha_baja_parte')->with('usuario','averia')->get();
		return view('parte.index', compact('partes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$usuarios = Usuario::whereNull('fecha_baja_usuario')->get();
		$averias = Averia::whereNull('fecha_baja_averia')->with('empresa')->get();
		return view('parte.create', compact('usuarios'), compact('averias'));
    }
	public function getAverias(Request $request)
	{
		try {
			$empresaId = $request->input('id_empresa');
			$averias = Averia::whereNull('fecha_baja_averia')->with('empresa')->where('id_empresa',$empresaId)->get();
			return response()->json(['data' => $averias]);
		} catch (Exception $ex) {
			return response()->json(['message' => $ex], 500);
		}
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
		Parte::create([
            'id_usuario' => $request['id_usuario'],
            'id_averia' => $request['id_averia'],
			'fecha_parte' => $request['fecha_parte'],
			'hora_parte' => $request['hora_parte'],
			'horas_realizadas' => $request['horas_realizadas'],
			'observaciones' => $request['observaciones'],
			'fecha_alta_parte' => date("Y/m/d"),
		]);
		
        $partes = Parte::whereNull('fecha_baja_parte')->with('usuario','averia')->get();
		return redirect()->route('parte.index', compact('partes'))
			->with('status','El parte se ha creado con éxito');
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
		$parte = Parte::findOrFail($id);
		return view('parte.edit', compact('parte'));
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
		Parte::where('id_parte', $id)->update([
			'id_usuario' => $request['id_usuario'],
            'id_averia' => $request['id_averia'],
			'fecha_parte' => $request['fecha_parte'],
			'hora_parte' => $request['hora_parte'],
			'horas_realizadas' => $request['horas_realizadas'],
			'observaciones' => $request['observaciones'],
			'fecha_modificacion_parte' => date("Y/m/d"),
		]);
		
		$partes = Parte::whereNull('fecha_baja_parte')->with('usuario','averia')->get();
		return redirect()->route('parte.index', compact('partes'))
			->with('status','El parte se ha actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Parte::where('id_parte', $id)->update([
			'fecha_baja_parte' => date("Y/m/d"),
		]);
		
        $partes = Parte::whereNull('fecha_baja_parte')->with('usuario','averia')->get();
        return redirect()->route('parte.index', compact('partes'))
			->with('status','El parte se ha eliminado con éxito');
    }
}
