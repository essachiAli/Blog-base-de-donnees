<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminBlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        \App\Models\User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // Create sample categories
        $categories = [
            ['name' => 'Technology', 'slug' => 'technology'],
            ['name' => 'Programming', 'slug' => 'programming'],
            ['name' => 'Web Development', 'slug' => 'web-development'],
            ['name' => 'Laravel', 'slug' => 'laravel'],
            ['name' => 'PHP', 'slug' => 'php'],
            ['name' => 'JavaScript', 'slug' => 'javascript'],
        ];

        foreach ($categories as $category) {
            \App\Models\Category::create($category);
        }
    }
}
