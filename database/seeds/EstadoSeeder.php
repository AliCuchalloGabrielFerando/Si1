<?php

use Illuminate\Database\Seeder;
use App\Estado;
use App\Descuento;
class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estado::create([
            'nombre'=>'Activo',
        ]);

        Estado::create([
            'nombre'=>'Inactivo',
        ]);
        Estado::create([
            'nombre'=>'Suspendido',
        ]);
        Descuento::create([
            'nombre'=> 'septiembre',
            'porcentaje_descuento'=> 0.97,
        ]);
        Descuento::create([
            'nombre'=> 'agosto',
            'porcentaje_descuento'=> 0.95,
        ]);
  
    }
}
