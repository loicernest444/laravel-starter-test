<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {

            DB::table('categories')->insert([
                'name' => $faker->sentence(),
                'slug' => $faker->slug(),
                'description' => $faker->paragraph(),

                'group_name' => $faker->word,
                'image' => $faker->imageUrl(),

                'meta_title' => $faker->sentence,
                'meta_description' => $faker->paragraph,
                'meta_keyword' => $faker->word . ',' . $faker->word,

                'order' => $i,

                'created_at' => $faker->dateTimeThisMonth,
                'updated_at' => $faker->dateTimeThisMonth
            ]);
        }
    }
}
