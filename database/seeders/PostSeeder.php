<?php

namespace Database\Seeders;

use App\Models\Post;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Factory::create();

        foreach (range(1,25) as $index)
        {
            $title = $faker->unique()->name;
            Post::create([
                'user_id' => rand(1,6),
                'category_id' => rand(1,10),
                'title' => $title,
                'slug' => strtolower(str_replace(' ','-',$title)),
                'description' => $faker->text,
                'image' => $faker->imageUrl,
                'status' => array_rand(['active' => 'active', 'inactive' => 'inactive'], 1),
            ]);
        }
    }
}
