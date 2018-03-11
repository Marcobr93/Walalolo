<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReviewTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test que comprueba que un usuario logeado puede realizar una review a otro usuario.
     */
    public function testReviewUser()
    {
        $user = factory(User::class)->create();

        $user2 = factory(User::class)->create();

        $this->actingAs($user);

        $response = $this->post('/user/'.$user2->id.'/review', [
            'comentario' => "Prueba"
        ]);

        $response->assertStatus(302);
    }
}
