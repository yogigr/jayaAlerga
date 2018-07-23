<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = File::get('database/json/provinces.json');
        $provinces = json_decode($file);
        foreach ($provinces as $province) {
        	DB::table('provinces')->insert([
        		'id' => $province->province_id,
        		'name' => $province->province,
        		'created_at' => now(),
        		'updated_at' => now()
        	]);
        }
    }
}
