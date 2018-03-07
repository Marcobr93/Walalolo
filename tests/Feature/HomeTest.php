<?php

namespace Tests\Feature;

use App\Producto;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomeTest extends TestCase
{
    /**
     * La página home es correcta
     */
    public function testHome()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

//    public function testHomeSinProductos()
//    {
//        $response = $this->get('/');
//
//        $response->assertSeeText('No hay productos para mostrar.');
//    }

    public function testHomeConProductos()
    {
        $response = $this->get('/');

        $user = factory(User::class)->create();

        factory(Producto::class)->create([
            'user_id' => $user->id
        ]);

        $response->assertSeeText('Precio');
    }
}
