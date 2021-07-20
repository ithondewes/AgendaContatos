<?php

use Illuminate\Database\Seeder;

class GruposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grupos')->insert([
            'grupo' => 'Amigos',
        ]);
        DB::table('grupos')->insert([
            'grupo' => 'Família',
        ]);
        DB::table('grupos')->insert([
            'grupo' => 'Trabalho',
        ]);
    }
}
