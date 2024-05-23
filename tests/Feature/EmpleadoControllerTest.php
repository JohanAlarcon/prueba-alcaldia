<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Departamento;
use App\Models\Empleado;

class EmpleadoControllerTest extends TestCase
{

    public function test_store_empleado()
    {
        $departamento = Departamento::first();

        $correos_random = ['@gmail.com', '@hotmail.com', '@yahoo.com', '@outlook.com', '@live.com'];
        $correo = $correos_random[array_rand($correos_random)];
        $numero = rand(1, 1000);


        $data = [
            'nombre' => 'John',
            'apellido' => 'Doe',
            'email' => "prueba$numero" . $correo,
            'telefono' => '12345678',
            'departamento_id' => $departamento->id
        ];

        Empleado::create($data);

        $this->assertDatabaseHas('empleados', $data);
    }

    public function test_update_empleado()
    {
        $departamento = Departamento::first();
        $empleado = Empleado::first();

        $correos_random = ['@gmail.com', '@hotmail.com', '@yahoo.com', '@outlook.com', '@live.com'];
        $correo = $correos_random[array_rand($correos_random)];
        $numero = rand(1, 1000);

        $data = [
            'nombre' => 'John',
            'apellido' => 'Doe',
            'email' => "prueba$numero" . $correo,
            'telefono' => '12345678',
            'departamento_id' => $departamento->id
        ];

        $empleado->update($data);

        $this->assertDatabaseHas('empleados', $data);

    }

    public function test_show_empleado()
    {
        $empleado = Empleado::first();

        $response = $this->get('/empleado/' . $empleado->id . '/edit');

        $response->assertStatus(200);
    }

    public function test_index_empleado()
    {
        $response = $this->get('/empleado');

        $response->assertStatus(200);
    }
}
