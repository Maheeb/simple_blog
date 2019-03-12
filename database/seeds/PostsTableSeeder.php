<?php

use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // reset the posts table
        DB::table('posts')->truncate();

        // generate 36 dummy posts data
        $posts = [];
        $faker = Factory::create();
        $date = Carbon::now();

        for ($i = 1; $i <= 12; $i++)
        {
            $image =  rand(3, 6) . ".jpg";
            $date->addHour(5);
            $publishedDate = clone($date);
            $createdDate   = clone($date);

            $posts[] = [
                'author_id'    => rand(1, 3),
                'title'        => $faker->sentence(rand(8, 12)),
                'excerpt'      => $faker->text(rand(250, 300)),
                'body'         => $faker->paragraphs(rand(10, 15), true),
                'slug'         => $faker->slug(),
                'image'        =>  $image ,
                'created_at'   => $createdDate,
                'updated_at'   => $createdDate,
                'published_at' => $i < 30 ? $publishedDate : ( rand(0, 1) == 0 ? NULL : $publishedDate->addDays(4) ),
                'view_count'   => rand(1, 10) * 10
            ];
        }

        DB::table('posts')->insert($posts);
    }
}
