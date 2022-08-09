<?php

namespace Database\Factories;

use App\Models\JobCollection;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobCategory>
 */
class JobCollectionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = JobCollection::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $f = fake();

        return [
            'name' => $f->name(),
            'image' => null,
            'summary' => $f->text(),
            'priority' => $f->randomElement(range(1, 100)),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
