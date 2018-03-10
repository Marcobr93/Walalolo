<?php

namespace Tests\Feature;

use App\Producto;
use App\User;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductosTest extends TestCase
{

    use DatabaseTransactions;


    public function testVistaProducto()
    {
        $user = factory(User::class)->create();

        $producto = factory(Producto::class)->create([
            'user_id' => $user->id
        ]);

        $response = $this->get('/producto/'.$producto->id);

        $response->assertStatus(200);
//        $response->assertSeeText($producto->titulo);
    }

    public function testVistaTablaProductos()
    {

        $response = $this->get('tabla-busqueda');

        $response->assertStatus(200);
    }

    public function testCrearProductoFallido()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $response = $this->post('/productos/crear', [
            'titulo' => ''
        ]);

        $response->assertSessionHas('errors');
    }


    public function testUpdateProductoTitulo()
    {
        $user = factory(User::class)->create();
        $producto = factory(Producto::class)->create([
            'user_id' => $user->id
        ]);
        $this->actingAs($user);

        $this->patch('/producto/'.$producto->id.'/editar/informacion-general', [
            'titulo' => 'Prueba',
        ]);

        $this->assertDatabaseHas('productos', [
            'id'        => $producto->id,
            'titulo' => 'Prueba',
        ]);
    }


    public function testBorrarProducto()
    {
        $user = factory(User::class)->create();
        $producto = factory(Producto::class)->create([
            'user_id' => $user->id
        ]);
        $this->actingAs($user);

        $response = $this->post('/producto/'.$producto->id.'/editar/borrar-producto');

        $response->assertStatus(405);

    }

}
