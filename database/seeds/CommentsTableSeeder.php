<?php

use App\Comment;
use App\Post;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker    = Factory::create();
        $comments = [];

        $posts = Post::published()->Desire()->take(5)->get();
        foreach ($posts as $post)
        {
            for ($i = 1, $iMax = rand(1, 10); $i <= $iMax; $i++)
            {
                $commentDate = $post->published_at->modify("+{$i} hours");

                $comments[] = [
                    'author_name' => $faker->name,
                    'author_email' => $faker->email,
                    'body' => $faker->paragraphs(rand(1, 5), true),
                    'post_id' => $post->id,
                    'created_at' => $commentDate,
                    'updated_at' => $commentDate,
                ];
            }
        }

        Comment::truncate();
        Comment::insert($comments);
    }
}
