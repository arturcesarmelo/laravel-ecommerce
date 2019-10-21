<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$category_names = collect([
    		'Laptops',
			'Desktops',
			'Mobile Phones',
			'Tablets',
			"TV's",
			'Digital Cameras',
			'Appliances',
    	]);

    	$category_names->each(function($name) {
			Category::create([
                'name'=>$name,
                'slug'=>Str::slug($name)
            ]);
    	});
    }
}
