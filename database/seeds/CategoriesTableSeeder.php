<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
    	for($i=1; $i<=20; $i++){
	    	$image = '/dump_images/image-'.rand(1, 13).'.jpg';
	    	$category = $faker->sentence($nbWords = 3, $variableNbWords = true);

	    	$slug = str_replace(' ', '-', strtolower(trim($category)));
	    	$slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);

	    	$object = [ 'image_sm' 		=> $image,
	                    'image_md' 		=> $image,
	                    'image_lg' 		=> $image,
	                    'category' 		=> $category,
	                    'slug' 			=> $slug,
	                    'parent' 		=> null,
	                    'status' 		=> $faker->boolean($chanceOfGettingTrue = 10),
	                    'featured' 		=> $faker->boolean($chanceOfGettingTrue = 5),
	                    'm_title' 		=> $faker->sentence($nbWords = 8, $asText = false),
	                    'm_keywords' 	=> $faker->sentence($nbWords = 12, $asText = false),
	                    'm_description' => $faker->sentence($nbWords = 15, $asText = false),
	                ];
	        DB::table('categories')->insert($object);
        }
    }
}
