<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
        	[
        		'id' => 1,
        		'name' => 'Administrator',
        		'created_at' => now(),
        		'updated_at' => now()
        	],
        	[
        		'id' => 2,
        		'name' => 'User',
        		'created_at' => now(),
        		'updated_at' => now()
        	]
        ]);
    }
}
