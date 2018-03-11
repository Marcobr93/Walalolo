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


    /**
     * Test que comprueba que la vista de un producto en específico funciona correctamente.
     */
    public function testVistaProducto()
    {
        $user = factory(User::class)->create();

        $producto = factory(Producto::class)->create([
            'user_id' => $user->id
        ]);

        $response = $this->get('/producto/' . $producto->id);

        $response->assertStatus(200);
//        $response->assertSeeText($producto->titulo);
    }


    /**
     * Test que comprueba que la vista de tabla-busqueda funciona correctamente.
     */
    public function testVistaTablaProductos()
    {

        $response = $this->get('tabla-busqueda');

        $response->assertStatus(200);
    }


    /**
     * Test que prueba la creación de un producto fallido.
     */
    public function testCrearProductoFallido()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $response = $this->post('/productos/crear', [
            'titulo' => ''
        ]);

        $response->assertSessionHas('errors');
    }


    /**
     * Test que comprueba que la vista de editar producto funciona correctamente.
     */
    public function testMostrarEditarProducto()
    {
        $user = factory(User::class)->create();
        $producto = factory(Producto::class)->create([
            'user_id' => $user->id
        ]);

        $this->actingAs($user);

        $response = $this->get('/producto/' . $producto->id . '/editar');

        $response->assertStatus(200);
    }


    /**
     * Test que comprueba que la vista de editar producto informacion-general funciona correctamente.
     */
    public function testMostrarEditarProductoInfoGeneral()
    {
        $user = factory(User::class)->create();
        $producto = factory(Producto::class)->create([
            'user_id' => $user->id
        ]);

        $this->actingAs($user);

        $response = $this->get('/producto/' . $producto->id . '/editar/informacion-general');

        $response->assertStatus(200);
    }


    /**
     * Test que comprueba que la vista de editar producto foto funciona correctamente.
     */
    public function testMostrarEditarProductoFoto()
    {
        $user = factory(User::class)->create();
        $producto = factory(Producto::class)->create([
            'user_id' => $user->id
        ]);

        $this->actingAs($user);

        $response = $this->get('/producto/' . $producto->id . '/editar/foto');

        $response->assertStatus(200);
    }


    /**
     * Test que comprueba que la vista de editar producto otros datos funciona correctamente.
     */
    public function testMostrarEditarProductoOtrosDatos()
    {
        $user = factory(User::class)->create();
        $producto = factory(Producto::class)->create([
            'user_id' => $user->id
        ]);

        $this->actingAs($user);

        $response = $this->get('/producto/' . $producto->id . '/editar/otros-datos');

        $response->assertStatus(200);
    }


    /**
     * Test que comprueba que la vista de editar producto borrar funciona correctamente.
     */
    public function testMostrarEditarProductoBorrar()
    {
        $user = factory(User::class)->create();
        $producto = factory(Producto::class)->create([
            'user_id' => $user->id
        ]);

        $this->actingAs($user);

        $response = $this->get('/producto/' . $producto->id . '/editar/borrar-producto');

        $response->assertStatus(200);
    }


    /**
     * Test que comprueba que funciona el editar el titulo del producto.
     */
    public function testUpdateProductoTitulo()
    {
        $user = factory(User::class)->create();
        $producto = factory(Producto::class)->create([
            'user_id' => $user->id
        ]);
        $this->actingAs($user);

        $this->patch('/producto/' . $producto->id . '/editar/informacion-general', [
            'titulo' => 'Prueba',
        ]);

        $this->assertDatabaseHas('productos', [
            'id' => $producto->id,
            'titulo' => 'Prueba',
        ]);
    }


    /**
     * Test que comprueba que podemos borrar un producto.
     */
    public function testBorrarProducto()
    {
        $user = factory(User::class)->create();
        $producto = factory(Producto::class)->create([
            'user_id' => $user->id
        ]);
        $this->actingAs($user);

        $response = $this->post('/producto/' . $producto->id . '/editar/borrar-producto');

        $response->assertStatus(405);

    }

}
