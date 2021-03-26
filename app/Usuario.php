<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuario';
	protected $primaryKey = 'id_usuario';
	
	protected $fillable =[
		'tipo_usuario',
		'nombre_usuario',
		'apellido_usuario',
		'email_usuario',
		'contrasena_usuario',
		'telefono_usuario',
		'estatus_usuario'
	];
	
	protected $hidden = [
        'contrasena_usuario',
		//'remember_token'
    ];
	
	public function partes()
    {
        return $this->hasMany('App\Parte');
    }
}
