<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersTest extends TestCase
{
    public function testUserCanLogin()
    {
        $user = factory(User::class)->create();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'secret'
        ]);

        $this->assertAuthenticatedAs($user);
    }


    public function testMostrarPaginaUsuario()
    {
        $user = factory(User::class)->create();

        $response = $this->get('/user/'.$user->slug);

        $response->assertStatus(200);
    }


    public function testMostrarPerfilUsuario()
    {
        $user = factory(User::class)->create();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'secret'
        ]);

        $this->assertAuthenticatedAs($user);

        $response = $this->get('/perfil');

        $response->assertStatus(200);
    }


    public function testMostrarPerfilEditarUsuario()
    {
        $user = factory(User::class)->create();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'secret'
        ]);

        $this->assertAuthenticatedAs($user);

        $response = $this->get('/perfil/editar');

        $response->assertStatus(200);
    }
}
