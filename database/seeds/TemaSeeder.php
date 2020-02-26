<?php

use Illuminate\Database\Seeder;

class TemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('temas')->insert([
            'id' => 1,
            'nombreTema' => "Software",
        ]);

        DB::table('temas')->insert([
            'id' => 2,
            'nombreTema' => "Costes",
        ]);

        DB::table('temas')->insert([
            'id' => 3,
            'nombreTema' => "Piezas",
        ]);

        DB::table('temas')->insert([
            'id' => 4,
            'nombreTema' => "Otros",
        ]);
    }
}
