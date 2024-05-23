<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Departamento;

class DepartamentoControllerTest extends TestCase
{

    public function test_store_departamento()
    {

        $data = [
            'nombre' => 'Administración',
            'estado' => 'A'
        ];

        Departamento::create($data);

        $this->assertDatabaseHas('departamentos', $data);
    }

    public function test_update_departamento()
    {
        $departamento = Departamento::first();

        $data = [
            'nombre' => 'Administración',
            'estado' => 'I'
        ];

        $departamento->update($data);

        $this->assertDatabaseHas('departamentos', $data);
    }
    public function test_show_departamento()
    {
        $departamento = Departamento::first();

        $response = $this->get('/departamento/' . $departamento->id.'/edit');

        $response->assertStatus(200);
    }

    public function test_index_departamento()
    {
        $response = $this->get('/departamento');

        $response->assertStatus(200);
    }


}
