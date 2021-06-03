<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Usuario;
use App\User;

class UsuarioController extends Controller
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
		$usuarios = Usuario::whereNull('fecha_baja_usuario')->get();
		return view("usuario.index", compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$validator = Validator::make($request->all(), [
			'email_usuario' => 'max:150|unique:usuario|unique:users,email',
			'telefono_usuario' => 'max:799999999',
			'contrasena_usuario' => 'required|max:255'
        ])->validate();
		
        $request = request()->except('_token','_method');
		User::create([
            'name' => $request['nombre_usuario'],
            'email' => $request['email_usuario'],
            'password' => Hash::make($request['contrasena_usuario']),
        ]);
		Usuario::create([
            'tipo_usuario' => $request['tipo_usuario'],
            'nombre_usuario' => $request['nombre_usuario'],
			'apellido_usuario' => $request['apellido_usuario'],
			'email_usuario' => $request['email_usuario'],
			'contrasena_usuario' => Hash::make($request['contrasena_usuario']),
			'telefono_usuario' => $request['telefono_usuario'],
			'estatus_usuario' => 'activo',
			'fecha_alta_usuario' => date("Y/m/d"),
		]);
		
		$usuarios = Usuario::whereNull('fecha_baja_usuario')->get();
        return redirect()->route('usuario.index', compact('usuarios'))
			->with('status','El usuario se ha creado con éxito');
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
        $usuario = Usuario::find($id);
        return view('usuario.edit', compact('usuario'));
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

		$validator = Validator::make($request->all(), [
			'telefono_usuario' => 'min:600000000|max:799999999',
			'contrasena_usuario' => 'required|max:255'
        ])->validate();
		
		User::where('email', $request['email_usuario'])->update([
            'name' => $request['nombre_usuario'],
            'password' => Hash::make($request['contrasena_usuario']),
        ]);
		Usuario::where('id_usuario', $id)->update([
			'tipo_usuario' => $request['tipo_usuario'],
            'nombre_usuario' => $request['nombre_usuario'],
			'apellido_usuario' => $request['apellido_usuario'],
			'contrasena_usuario' => Hash::make($request['contrasena_usuario']),
			'telefono_usuario' => $request['telefono_usuario'],
			'fecha_modificacion_usuario' => date("Y/m/d"),
		]);
		
		$usuarios = Usuario::whereNull('fecha_baja_usuario');
		return redirect()->route('usuario.index',compact('usuarios'))
			->with('status','El usuario se ha actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$usuario = Usuario::find($id);
		$email = 'deleted-'.$usuario['email_usuario'];
		
		User::where('email', $usuario['email_usuario'])->update([
			'email' => $email
        ]);
		Usuario::where('id_usuario', $id)->update([
			'fecha_baja_usuario' => date("Y/m/d"),
			'email_usuario' => $email,
			'estatus_usuario' => 'baja'
		]);
		
		$usuarios = Usuario::whereNull('fecha_baja_usuario')->get();
        return redirect()->route('usuario.index', compact('usuarios'))
			->with('status','El usuario se ha eliminado con éxito');
    }
}
