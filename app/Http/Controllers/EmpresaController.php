<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use Carbon\Carbon;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$empresas = Empresa::whereNull('fecha_baja_empresa')->get();
		return view("empresa.index", compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresa.create');
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
		Empresa::create([
            'cif' => $request['cif'],
            'nombre_empresa' => $request['nombre_empresa'],
			'ciudad_empresa' => $request['ciudad_empresa'],
			'direccion_empresa' => $request['direccion_empresa'],
            'codigo_postal_empresa' => $request['codigo_postal_empresa'],
			'telefono_empresa' => $request['telefono_empresa'],
			'email_empresa' => $request['email_empresa']
		]);
		Empresa::where('cif', $request['cif'])->update([
			'fecha_alta_empresa' => Carbon::now()->format('Y-m-d')
		]);
		
		$empresas = Empresa::whereNull('fecha_baja_empresa')->get();
        return redirect()->route('empresa.index', compact('empresas'));
		
		//->with('status','La empresa se ha creado con éxito');
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
		$empresa = Empresa::find($id);
        return view('empresa.edit', compact('empresa'));
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

		Empresa::where('id_empresa', $id)->update([
			'nombre_empresa' => $request['nombre_empresa'],
			'cif' => $request['cif'],
			'ciudad_empresa' => $request['ciudad_empresa'],
			'direccion_empresa' => $request['direccion_empresa'],
			'codigo_postal_empresa' => $request['codigo_postal_empresa'],
			'email_empresa' => $request['email_empresa'],
			'telefono_empresa' => $request['telefono_empresa'],
			'fecha_modificacion_empresa' => Carbon::now()->format('Y-m-d'),
		]);
		
		$empresas = Empresa::whereNull('fecha_baja_empresa');
		return redirect()->route('empresa.index',compact('empresas'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		Empresa::where('id_empresa', $id)->update([
			'fecha_baja_empresa' => Carbon::now()->format('Y-m-d'),
		]);
		
		$empresas = Empresa::whereNull('fecha_baja_empresa')->get();
        return redirect()->route('empresa.index', compact('empresas'));
    }
}
