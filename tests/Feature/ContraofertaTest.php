<?php

namespace Tests\Feature;

use App\Contraoferta;
use App\Producto;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContraofertaTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test que comprueba que el usuario logeado puede realizar una contraoferta a un producto que tenga negociacion_precio
     * '1'.
     */
    public function testContraofertaProducto()
    {
        $user = factory(User::class)->create();

        $producto = factory(Producto::class)->create([
            'user_id' => $user->id,
            'negociacion_precio' => '1'
        ]);

        $response = $this->post('/producto/'.$producto->id.'/contraoferta', [
            'oferta' => 9
        ]);

        $response->assertStatus(302);
    }


    /**
     * Test que nos muestra las ofertas de un usuario sobre sus productos.
     */
    public function testOfertasUser(){
        $user = factory(User::class)->create();
        $user2 = factory(User::class)->create();
        $producto = factory(Producto::class)->create([
            'user_id' => $user->id,
            'negociacion_precio' => 1
        ]);
        $contraoferta = factory(Contraoferta::class)->create([
            'vendedor_user_id' => $user->id,
            'comprador_user_id' => $user2->id,
            'producto_id' => $producto->id,
            'oferta' => 8,
            'estado_oferta' => 'En proceso'
        ]);

        $this->actingAs($user);

        $response = $this->get('/ofertas/'.$user->slug);

        $response->assertStatus(200);
    }


    /**
     * Test que nos comprueba que funciona la página de ofertas aceptadas de los productos del usuario logeado.
     */
    public function testOfertasAceptadas(){
        $user = factory(User::class)->create();

        $this->actingAs($user);

        $response = $this->get('/ofertas-aceptadas/'.$user->slug);

        $response->assertStatus(200);
    }
}
