<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Locker;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //$users = User::factory(10)->create();
        /*
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        
        foreach ($users as $user) {
        Post::factory()->count(1)->create([
        'user_id' => $user->id
        ]);
        }
        /*
        $this->call([
            PostSeeder::class,
        ]);
        */
        Locker::factory(15)->create();
    }
}
