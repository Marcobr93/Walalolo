<?php

namespace Tests\Feature;

use App\Producto;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductosTest extends TestCase
{

    public function testCrearProducto()
    {
        $user = factory(User::class)->create();

        $producto = factory(Producto::class)->create([
            'user_id' => $user->id
        ]);

        $response = $this->get('/producto/'.$producto->id);

        $response->assertStatus(200);
//        $response->assertSeeText($producto->titulo);
    }
}
