<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parte extends Model
{
    protected $table = 'parte';
	protected $primaryKey = 'id_parte';
	
	protected $fillable =[
		'fecha_parte',
		'hora_parte',
		'horas_realizadas',
		'observaciones'
	];
	
	
	public function usuario()
    {
        return $this->belongsTo('App\Usuario', 'id_usuario');
    }
	public function averia()
    {
        return $this->belongsTo('App\Averia', 'id_averia');
    }
	
	
}
