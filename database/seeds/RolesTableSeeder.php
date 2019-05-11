<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
        	'name' => 'admin',
        	'display_name' => 'Usuario administrador',
        	'description' => 'Usuario que maneja todos los recursos',
        	'created_at' => now(),
        	'updated_at' => now(),
        ]);

        DB::table('roles')->insert([
        	'name' => 'client',
        	'display_name' => 'Usuario cliente',
        	'description' => 'Usuario que consume los recursos disponibles (Web)',
        	'created_at' => now(),
        	'updated_at' => now(),
        ]);

        DB::table('roles')->insert([
        	'name' => 'counselor',
        	'display_name' => 'Usuario consejero',
        	'description' => 'Usuario que ofrece su servicio (Web)',
        	'created_at' => now(),
        	'updated_at' => now(),
        ]);
    }
}
