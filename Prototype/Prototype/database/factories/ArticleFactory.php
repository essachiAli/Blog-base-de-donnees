<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Category;
use App\models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Article::class;
    public function definition(): array
    {
        $title = fake()->sentence();
        $status = fake()->randomElement(['pending', 'published', 'archived']);
        $publishedAt = $status === 'published' ? fake()->dateTimeBetween('-1 year') : null;
        return [
            'title' => $title,
            'slug' => Str::slug($title) . '-' . Str::random(6),
            'content' => fake()->paragraphs(6, true),
            'image' => fake()->boolean(70) ? 'https://loremflickr.com/800/400?' . rand(1, 1000) : null,
            'views' => fake()->numberBetween(0, 5000),
            'author_id' => User::inRandomOrder()->first()?->user_id ?? User::factory(),
            'category_id' => Category::inRandomOrder()->first()?->category_id ?? Category::factory(),
            'status' => $status,
            'is_moderated' => fake()->boolean(30),
            'published_at' => $publishedAt,
        ];
    }
}
