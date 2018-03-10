<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersTest extends TestCase
{
    use DatabaseTransactions;


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

    public function testMostrarPaginaOtroUsuario()
    {
        $user = factory(User::class)->create();

        $user2 = factory(User::class)->create();

        $this->actingAs($user);

        $response = $this->get('/user/'.$user2->slug);

        $response->assertStatus(200);
    }


    public function testMostrarPerfilUsuario()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/perfil');

        $response->assertStatus(200);
    }


    public function testMostrarPerfilEditarUsuario()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/perfil/editar');

        $response->assertStatus(200);
    }

    public function testMostrarPerfilEditarCuentaUsuario()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/perfil/editar/cuenta');

        $response->assertStatus(200);
    }

    public function testMostrarPerfilEditarPasswordUsuario()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/perfil/editar/password');

        $response->assertStatus(200);
    }

    public function testMostrarPerfilEditarFotoUsuario()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/perfil/editar/avatar');

        $response->assertStatus(200);
    }

    public function testMostrarPerfilEditarDatosPersonalesUsuario()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/perfil/editar/datos-personales');

        $response->assertStatus(200);
    }

    public function testMostrarPerfilEditarBorrarUsuario()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/perfil/editar/borrar-usuario');

        $response->assertStatus(200);
    }

    public function testUpdatePerfilNombre()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user);

        $this->patch('/perfil/editar/cuenta', [
            'nombre_usuario' => 'Paquita',
        ]);

        $this->assertDatabaseHas('users', [
            'id'        => $user->id,
            'nombre_usuario' => 'Paquita',
        ]);
    }

    public function testUpdatePerfilWebsite()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user);

        $this->patch('/perfil/editar/cuenta', [
            'website' => 'Prueba',
        ]);

        $this->assertDatabaseHas('users', [
            'id'        => $user->id,
            'website' => 'Prueba',
        ]);
    }

    public function testBorrarUsuario()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user);

        $response =  $this->post('/perfil/editar/borrar-usuario');

        $response->assertStatus(405);
    }

}
