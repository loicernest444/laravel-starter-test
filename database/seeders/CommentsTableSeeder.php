<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {

            DB::table('comments')->insert([
                'name' => $faker->name,
                'slug' => $faker->slug,
                'comment' => $faker->paragraph(2),

                'parent_id' => rand(1, 10),

                'commentable_id' => 1,
                'commentable_type' => 'Modules\Article\Models\Post',

                'user_id' => $faker->randomDigitNotNull,
                'user_name' => $faker->name,

                'order' => $i,
                'status' => $faker->randomElement([0,1]),

                'published_at' => $faker->dateTimeThisMonth,
                'created_by' => rand(1, 3),

                'created_at' => $faker->dateTimeThisMonth,
                'updated_at' => $faker->dateTimeThisMonth
            ]);
        }
    }
}
