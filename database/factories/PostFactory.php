<?php

namespace Database\Factories;

use App\Helpers\Common;
use App\Models\Admin;
use App\Models\Category;
use App\Models\JobCategory;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title =  fake()->name();
        return [
            'title' => $title,
            'image' => 'https://source.unsplash.com/random',
            'slug' => Common::createSlug($title),
            'summary' => fake()->name(),
            'content' => fake()->name(),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (Post $post) {
            $post->creator_id = 1;
            $post->save();
            $jobCate = JobCategory::factory(1)->createOne();
            $cate = Category::factory(1)->createOne();
            $post->jobCategories()->attach($jobCate->id);
            $post->categories()->attach($cate->id);
        });
    }
}
