<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ValoracionTest extends TestCase
{
    use DatabaseTransactions;


    /**
     * Test que comprueba que un usuario logeado puede valorar a otro usuario distinto.
     */
    public function testValoracionUser()
    {
        $user = factory(User::class)->create();

        $user2 = factory(User::class)->create();

        $this->actingAs($user);

        $response = $this->post('/user/'.$user2->id.'/valorar', [
            'valoracion' => 5
        ]);

        $response->assertStatus(302);
    }
}
