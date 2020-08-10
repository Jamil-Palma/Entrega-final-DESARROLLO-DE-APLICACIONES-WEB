<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([ 'ci' =>
            '12345', 
            'nombre' => 'super', 
            'apellido' => 'administrador', 
            'cel' => '1000',
            'email' => 'gg@gmail.com', 
            'user_name' => 'administrador', 
            'password' => Hash::make('admi1234'),
            'is_admin' => '1', 
        ]); 
        DB::table('users')->insert([ 
            'ci' => '123456', 
            'nombre' => 'profe', 
            'apellido' => 'sor', 
            'cel' => '2000',
            'email' => 'gg2@gmail.com', 
            'user_name' => 'usuario', 
            'password' => Hash::make('user1234'),
            'is_admin' => '0', 
        ]);
    }
}
