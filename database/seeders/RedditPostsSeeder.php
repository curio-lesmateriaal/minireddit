<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RedditPostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed data for reddit posts
        $redditPosts = [
            [
                'title' => 'What are some underrated movies everyone should watch?',
                'upvotes' => 1543,
                'comments' => [
                    [
                        'user' => 'moviebuff123',
                        'comment' => 'I would say *Children of Men*. It’s a masterpiece that doesn’t get enough attention.',
                        'upvotes' => 312,
                    ],
                    [
                        'user' => 'filmcritic87',
                        'comment' => '*Moon* is another one. Sam Rockwell is amazing in it.',
                        'upvotes' => 204,
                    ],
                    [
                        'user' => 'cinephile22',
                        'comment' => 'Can’t forget about *The Fall*. Visually stunning and a great story.',
                        'upvotes' => 152,
                    ],
                ],
            ],
            [
                'title' => 'What’s a simple life hack that improved your productivity?',
                'upvotes' => 891,
                'comments' => [
                    [
                        'user' => 'productivityguru',
                        'comment' => 'Using the Pomodoro technique! Work for 25 minutes, then take a 5-minute break. Rinse and repeat.',
                        'upvotes' => 450,
                    ],
                    [
                        'user' => 'timemaster',
                        'comment' => 'Getting up early and tackling the hardest tasks first thing in the morning.',
                        'upvotes' => 367,
                    ],
                ],
            ],
            [
                'title' => 'What’s the most beautiful place you’ve ever visited?',
                'upvotes' => 2076,
                'comments' => [
                    [
                        'user' => 'traveladdict',
                        'comment' => 'Banff National Park in Canada. The mountains and lakes are just breathtaking.',
                        'upvotes' => 876,
                    ],
                    [
                        'user' => 'wanderlust99',
                        'comment' => 'Iceland, hands down. The waterfalls and volcanic landscapes are otherworldly.',
                        'upvotes' => 732,
                    ],
                    [
                        'user' => 'explorer34',
                        'comment' => 'The Faroe Islands. It’s like stepping into a fairy tale.',
                        'upvotes' => 568,
                    ],
                    [
                        'user' => 'nomad87',
                        'comment' => 'For me, it’s the Swiss Alps. The scenery is just stunning, especially in winter.',
                        'upvotes' => 654,
                    ],
                ],
            ],
        ];

        // Insert posts and their comments
        foreach ($redditPosts as $post) {
            $postId = DB::table('posts')->insertGetId([
                'title' => $post['title'],
                'upvotes' => $post['upvotes'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            foreach ($post['comments'] as $comment) {
                DB::table('comments')->insert([
                    'post_id' => $postId,
                    'user' => $comment['user'],
                    'comment' => $comment['comment'],
                    'upvotes' => $comment['upvotes'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
