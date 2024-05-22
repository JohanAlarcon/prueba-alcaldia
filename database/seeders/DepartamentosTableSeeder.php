<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departamentos')->insert([
            ['nombre' => 'Recursos Humanos','estado' => 'A', 'created_at' => NOW()],
            ['nombre' => 'Desarrollo','estado' => 'A', 'created_at' => NOW()],
            ['nombre' => 'Ventas', 'estado' => 'A','created_at' => NOW()],
        ]);
    }
}
