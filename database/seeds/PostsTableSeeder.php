<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
    	for($i=1; $i<=40; $i++){
    		$image = '/dump_images/image-'.rand(1, 13).'.jpg';
    		$title = $faker->sentence($nbWords = rand(7, 15), $variableNbWords = true);

    		$slug = str_replace(' ', '-', strtolower(trim($title)));
    		$slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);

    		$content = $faker->paragraph($nbSentences = 50, $variableNbSentences = true);

        	$object = [ 'image_sm' 		=> $image,
                        'image_md' 		=> $image,
                        'image_lg' 		=> $image,
                        'title' 		=> $title,
                        'category_id' 	=> rand(0, 20),
                        'content' 		=> $content,
                        'slug' 			=> $slug,
                        'status' 		=> $faker->boolean($chanceOfGettingTrue = 35),
                        'featured' 		=> $faker->boolean($chanceOfGettingTrue = 35),
                        'commentable' 	=> $faker->boolean($chanceOfGettingTrue = 35),
                        'views'         => rand(1, 999),
                        'likes'         => rand(1, 999),
                        'm_title' 		=> $faker->sentence($nbWords = 8, $asText = false),
                        'm_keywords' 	=> $faker->sentence($nbWords = 12, $asText = false),
                        'm_description' => $faker->sentence($nbWords = 15, $asText = false),
                        'created_by'	=> '1',
                        'created_at'    =>  date('Y-m-d H:i:s'),
                        'updated_at'    =>  date('Y-m-d H:i:s'),
                    ];
            DB::table('posts')->insert($object);
        }
    }
}
