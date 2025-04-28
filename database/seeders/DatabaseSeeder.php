<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use Database\Seeders\PostSeeder;
use Database\Seeders\CategorySeeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'username' => 'natasha',
            'email' => 'test@gmail.com',
            'password' => Hash::make('Asd12@'),
            'location' => 'Bandung',
        ]);

        $this->call([
            CategorySeeder::class,
            PostSeeder::class,
        ]);
    }
}
