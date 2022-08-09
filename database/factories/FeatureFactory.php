<?php

namespace Database\Factories;

use App\Enums\Feature\EType;
use App\Models\Feature;
use App\Models\JobCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobCategory>
 */
class FeatureFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Feature::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $type = array_keys(EType::cases());
        $f = fake();
        return [
            'name' => $f->name(),
            'type_group' => $f->randomElement($type),
            'is_popular' => $f->randomElement([1, 2]),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
