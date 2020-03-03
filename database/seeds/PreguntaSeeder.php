<?php

use Illuminate\Database\Seeder;

class PreguntaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('es_ES');

        for ($i = 1; $i <= 5; $i++) {
            DB::table('preguntas')->insert([
                'id' => $i,
                'titulo' => $faker ->company,
                'descripcion' => $faker -> realText(130,5),
                'puntuacionPregu' => random_int(0,999),
                'user_id' => 1,
                'tema_id' => $faker ->numberBetween(1,4),
                'created_at' => $faker -> date(),

            ]);
        }
        for ($i = 6; $i <= 18; $i++) {
            DB::table('preguntas')->insert([
                'id' => $i,
                'titulo' => $faker ->company,
                'descripcion' => $faker -> realText(130,5),
                'puntuacionPregu' => random_int(0,99),
                'user_id' => random_int(2,5),
                'tema_id' => $faker ->numberBetween(1,4),
                'created_at' => $faker -> date(),

            ]);
        }
    }
}
