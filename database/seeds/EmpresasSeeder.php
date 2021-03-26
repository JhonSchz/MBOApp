<?php

use Illuminate\Database\Seeder;
use App\Empresa;
use Overdesign\CifGenerator\Cif;

class EmpresasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
	
		for ($i = 0; $i <=19; $i++){
			$cifGenerator = new Cif();    //  override2k / cif-generator

			DB::table('empresa')->insert([
				"cif" => $cifGenerator->get(),
				"nombre_empresa" => $faker->company,
				"ciudad_empresa" => $faker->city,
				"direccion_empresa" => $faker->streetName,
				"codigo_postal_empresa" => $faker->postcode,
				"telefono_empresa" => mt_rand(900000000,999999999),
				"email_empresa"	=> $faker->safeEmail,
				"fecha_alta_empresa" =>	Carbon\Carbon::now()->format('Y-m-d'),
			]);	
		}	
    }
}
