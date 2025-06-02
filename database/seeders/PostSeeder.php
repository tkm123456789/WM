<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'title' => 'Lamp',
                'image' => 'lamp.jpg',
                'price' => '14',
                'description' => 'This is a lamp that I have used for two years but I no longer need.'
            ],
            [
                'title' => 'Notebooks',
                'image' => 'notebooks.jpg',
                'price' => '12',
                'description' => 'Notebooks, never used. I am open to bulk or individual sales'
            ],
            [
                'title' => 'Headphones',
                'image' => 'headphones.jpg',
                'price' => '75',
                'description' => 'Really nice noise cancelling headphones. A little worn but still work great'
            ],
            [
                'title' => 'Calculator',
                'image' => 'calculator.jpg',
                'price' => '36',
                'description' => 'Basic calculator. I just got a TI-84 and no longer need this one'
            ],
            [
                'title' => 'Computer Mouse',
                'image' => 'mouse.jpg',
                'price' => '28',
                'description' => 'Wireless mouse. Needs two AA batteries'
            ],
            [
                'title' => 'Snow Boots',
                'image' => 'boots.jpg',
                'price' => '126',
                'description' => 'The best snow boots you will ever wear. Willing to negotiate price'
            ]
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }
    }
} 