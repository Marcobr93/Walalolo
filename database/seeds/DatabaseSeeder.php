<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = factory(App\User::class, 20)->create();

        $users->each(function (App\User $user) use ($users) {
            $productos = factory(App\Producto::class, 10)->create([
                'user_id' => $user->id,
            ]);

            $productos->each(function (App\Producto $producto) use ($user) {
                $contraofertas = factory(App\Contraoferta::class, 1)->create([
                    'vendedor_user_id' => $user->id,
                    'comprador_user_id' => rand(1, 20),
                    'producto_id' => $producto->id,
                ]);

                $visitas = factory(\App\Visita::class, rand(0, 50))->create([
                    'producto_id' => $producto->id,
                    'user_id' => $user->id
                ]);

            });

            $valoraciones = factory(App\Valoracion::class, 1)->create([
                'valora_user_id' => $user->id,
                'valorado_user_id' => rand(1, 20),
            ]);

            $reviews = factory(App\Review::class, 1)->create([
                'user_id' => $user->id,
                'review_user_id' => rand(1, 20),
            ]);

        });

    }
}
