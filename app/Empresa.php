<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresa';
	protected $primaryKey = 'id_empresa';
	
	protected $fillable =[
		'nombre_empresa',
		'cif',
		'ciudad_empresa',
		'direccion_empresa',
		'codigo_postal_empresa',
		'email_empresa',
		'telefono_empresa',
		'fecha_alta_empresa',
	];
	
	public $timestamps = false;
	
	public function averias()
    {
        return $this->hasMany('App\Averia');
    }
}
