<?php

namespace Database\Factories;

use App\Helpers\Common;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = fake()->name();
        return [
            'parent_id' => null,
            'name' => $name,
            'slug' => Common::createSlug($name),
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
