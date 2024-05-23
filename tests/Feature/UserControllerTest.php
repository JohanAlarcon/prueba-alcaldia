<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;

class UserControllerTest extends TestCase
{

    public function test_store_user()
    {
        $correos_random = ['@gmail.com', '@hotmail.com', '@yahoo.com', '@outlook.com', '@live.com'];
        $correo = $correos_random[array_rand($correos_random)];
        $numero = rand(1, 1000);

        $data = [
            'name' => 'John',
            'email' => 'prueba' . $numero . $correo,
            'password' => bcrypt('12345678'),
        ];

        User::create($data);

        $this->assertDatabaseHas('users', $data);

    }

}
