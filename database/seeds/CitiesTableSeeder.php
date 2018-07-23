<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $file =  File::get('database/json/cities.json');
       $cities = json_decode($file);
       foreach ($cities as $city) {
       		DB::table('cities')->insert([
       			'id' => $city->city_id,
       			'name' => $city->city_name,
       			'province_id' => $city->province_id,
       			'type' => $city->type,
       			'postal_code' => $city->postal_code
       		]);
       }
    }
}
