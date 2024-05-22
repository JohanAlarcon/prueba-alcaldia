<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpleadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empleados')->insert([
            ['nombre' => 'Juan', 'apellido' => 'Perez', 'email' => 'juan.perez@example.com', 'telefono' => '123456789', 'departamento_id' => 1, 'created_at' => NOW()],
            ['nombre' => 'Maria', 'apellido' => 'Gomez', 'email' => 'maria.gomez@example.com', 'telefono' => '987654321', 'departamento_id' => 2, 'created_at' => NOW()],
            ['nombre' => 'Carlos', 'apellido' => 'Lopez', 'email' => 'carlos.lopez@example.com', 'telefono' => '456123789', 'departamento_id' => 3, 'created_at' => NOW()],
        ]);
    }
}
