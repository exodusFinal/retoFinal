<?php

use Illuminate\Database\Seeder;


class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('es_ES');

        DB::table('users')->insert([
            'id' => 1,
            'name' => "exodus",
            'email' => "exodus@gmail.com",
            'password' => "$2y$10$7I7aWAAgoyqCW7I96JSx7eVeYtd7O15C4YuyAh80ND8/I95Ah1Jwu",
            //12345678
            'nombre' => "exodus",
            'apellido' => "exodus",
            'descripcion' => "USUARIO exodus, soy un bot",
            'puntosUsu' => 100,
            'foto' => "foto.png",
        ]);

        for ($i = 2; $i <10; $i++) {
            DB::table('users')->insert([
                'id' => $i,
                'name' => $faker -> name,
                'email' => $faker -> companyEmail,
                'password' => "$2y$10$7I7aWAAgoyqCW7I96JSx7eVeYtd7O15C4YuyAh80ND8/I95Ah1Jwu",
                //12345678
                'nombre' => $faker -> name,
                'apellido' => $faker -> firstName,
                'descripcion' => $faker -> realText(130,5),
                'puntosUsu' => random_int(0,150),
                'foto' => "foto.png",
            ]);
        }

    }
}
