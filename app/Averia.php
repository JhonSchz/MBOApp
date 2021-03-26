<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Averia extends Model
{
    protected $table = 'averia';
	protected $primaryKey = 'id_averia';
	protected $foreignKey= 'id_empresa';
	
	protected $fillable =[
		'descripcion_averia',
		'estatus_averia'
	];
	
	
	public function empresa()
    {
        return $this->belongsTo('App\Empresa', 'id_empresa');
    }
	public function partes()
    {
        return $this->hasMany('App\Parte');
    }
}
