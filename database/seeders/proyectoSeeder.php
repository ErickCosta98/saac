<?php

namespace Database\Seeders;

use App\Models\proyectos;
use Illuminate\Database\Seeder;

class proyectoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        proyectos::create([
            'contenido' => ''
        ]);
    }
}
