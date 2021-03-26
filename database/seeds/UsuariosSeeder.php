<?php

use Illuminate\Database\Seeder;
use App\Usuario;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$faker = Faker\Factory::create();
		$tipo_usuario = ["empleado","encargado","administrador"];
		//$password = 'pepe';
		
		for ($i = 0; $i <= 2; $i++) {			
			DB::table('usuario')->insert([
				'tipo_usuario' => $tipo_usuario[$i],
				'contrasena_usuario' => Hash::make('pepe'),
				'nombre_usuario' => $faker->firstName,
				'apellido_usuario' => $faker->lastName,
				'email_usuario' => $faker->safeEmail,
				'telefono_usuario' => mt_rand(600000000,799999999),
				'estatus_usuario' => "activo",
				'fecha_alta_usuario' => Carbon\Carbon::now()->format('Y-m-d'),
			]);
		}
		//'password' => Hash::make('password'),		
    }
}
