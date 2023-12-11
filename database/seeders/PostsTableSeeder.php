<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {

            DB::table('posts')->insert([
                'name' => $faker->name,
                'slug' => $faker->slug,
                'intro' => $faker->paragraph,
                'content' => $faker->paragraphs(3, true),
                'type' => $faker->randomElement(['article', 'page']),
                'category_id' => rand(1, 3),
                'category_name' => $faker->word,
                'is_featured' => rand(0, 1),
                'featured_image' => $faker->imageUrl(),

                'created_by' => rand(1, 3),
                'created_by_name' => $faker->randomElement(['user', 'admin']),
                'created_by_alias' => $faker->randomElement(['user', 'admin']),

                'meta_title' => $faker->sentence,
                'meta_keywords' => $faker->word . ',' . $faker->word,
                'meta_description' => $faker->paragraph,
                'meta_og_image' => $faker->imageUrl(),
                'meta_og_url' => $faker->url,

                'hits' => rand(0, 1000),
                'order' => $i,
                'status' => rand(0, 1),

                'published_at' => $faker->dateTimeThisMonth,
                'created_at' => $faker->dateTimeThisDecade,
                'updated_at' => $faker->dateTimeThisMonth
            ]);
        }
    }
}
