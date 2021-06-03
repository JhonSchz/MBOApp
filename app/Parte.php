<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parte extends Model
{
    protected $table = 'parte';
	protected $primaryKey = 'id_parte';
	protected $foreignKey= ['id_usuario','id_averia'];
	
	protected $fillable =[
		'id_usuario',
		'id_averia',
		'fecha_parte',
		'hora_parte',
		'horas_realizadas',
		'observaciones',
		'fecha_alta_parte',
	];
	
	public $timestamps = false;
	
	public function usuario()
    {
        return $this->belongsTo('App\Usuario', 'id_usuario');
    }
	public function averia()
    {
        return $this->belongsTo('App\Averia', 'id_averia');
    }
	
}