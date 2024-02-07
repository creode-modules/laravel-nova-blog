<?php

namespace Creode\LaravelNovaBlog\Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @template TModel of \Creode\LaravelNovaBlog\Post
 *
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<TModel>
 */
class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<TModel>
     */
    protected $model = \Creode\LaravelNovaBlog\Entities\Post::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence();

        return [
            'published_at' => $this->faker->randomElement([null, $this->faker->dateTimeBetween('-1 year', 'now')]),
            'title' => $title,
            'slug' => Str::slug($title),
            'meta_description' => $this->faker->sentence(),
            'featured_post' => $this->faker->boolean(10),
            'body' => '',
            'excerpt' => $this->faker->sentence(),
            'featured_image' => $this->faker->image(
                Storage::disk(config('nova-blog.image_disk', 'public'))->path(''),
                640,
                480,
                null,
                false
            ),
        ];
    }
}
