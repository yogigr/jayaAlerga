<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::insert([
        	[
        		'id' => 1,
        		'code' => 'AJ001',
        		'name' => 'Sandal Swallow',
        		'slug' => 'sandal-swallow',
        		'price' => 10000,
        		'category_id' => 1,
                'weight' => 500,
        		'created_at' => now(),
        		'updated_at' => now() 
        	],

        	[
        		'id' => 2,
        		'code' => 'AJ002',
        		'name' => 'Sandal Gunung Eiger',
        		'slug' => 'sandal-gunung-eiger',
        		'price' => 100000,
        		'category_id' => 1,
                'weight' => 1500,
        		'created_at' => now(),
        		'updated_at' => now() 
        	],

        	[
        		'id' => 3,
        		'code' => 'AJ003',
        		'name' => 'Sepatu Sport Nike',
        		'slug' => 'sepatu-sport-nike',
        		'price' => 500000,
        		'category_id' => 2,
                'weight' => 2000,
        		'created_at' => now(),
        		'updated_at' => now() 
        	],

        	[
        		'id' => 4,
        		'code' => 'AJ004',
        		'name' => 'Sepatu Casual Adidas',
        		'slug' => 'sepatu-casual-adidas',
        		'price' => 400000,
        		'category_id' => 2,
                'weight' => 2500,
        		'created_at' => now(),
        		'updated_at' => now() 
        	],
        ]);
    }
}
