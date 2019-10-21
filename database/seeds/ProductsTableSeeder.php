<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = collect([
        	['name'=>'Mac Book Pro', 'details'=>'15 inch, 1TB SSD, 32GB RAM'],
        	['name'=>'Laptop', 'details'=>'15 inch, 1TB SSD, 32GB RAM'],
        	['name'=>'Laptop', 'details'=>'13 inch, 1TB SSD, 32GB RAM'],
        	['name'=>'Laptop', 'details'=>'11 inch, 500GB SSD, 32GB RAM'],
        	['name'=>'Laptop', 'details'=>'13 inch, 250GB SSD, 32GB RAM'],
        	['name'=>'Laptop', 'details'=>'13 inch, 1TB SSD, 9GB RAM'],
        	['name'=>'Laptop', 'details'=>'15 inch, 1TB SSD, 32GB RAM'],
        	['name'=>'Laptop', 'details'=>'15 inch, 1TB SSD, 8GB RAM']
        ]);	

        $products->each(function($product) {

       		#has to be unique 	
        	$name = $product['name'] . ' - ' . Str::random(5) . '-' . rand(100,999); 

        	App\Product::create([
        		'name' => $name,
        		'slug' => Str::slug($name),
        		'details'=>$product['details'],
        		'price'=>rand(150000,250000),
        		'description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat aliquam maxime, amet dignissimos minus iusto. Cumque aliquam perferendis sequi sint'
        	]);
        });
    }
}
