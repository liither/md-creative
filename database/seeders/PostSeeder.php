<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create(
            [
                'title' => 'A Loving Heart is the Truest Wisdom',
                'author_id' => 1,
                'category_id' => 1,
                'slug' => 'loving-heart-1',
                'article_text' => 'Molestiae cupiditate inventore animi, maxime sapiente optio, illo est nemo veritatis repellat sunt doloribus nesciunt! Minima laborum magni reiciendis qui voluptate quisquam voluptatem soluta illo eum ullam incidunt rem assumenda eveniet eaque sequi deleniti tenetur dolore amet fugit perspiciatis ipsa, odit. Nesciunt dolor minima esse vero ut ea, repudiandae suscipit!',
            ]
        );

        Post::create(
            [
                'title' => 'A Loving Heart is the Truest Wisdom Pt. 2',
                'author_id' => 1,
                'category_id' => 1,
                'slug' => 'loving-heart-2',
                'article_text' => 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.',
            ]
        );
    }
}
