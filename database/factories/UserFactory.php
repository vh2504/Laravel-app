<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Prefecture;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Zipcode;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => Hash::make('secret123'), // secret
            'remember_token' => Str::random(10),
            'role_id' => Role::where('name', 'user')->first()->id,
            'created_at' => now(),
            'updated_at' => now(),
            'picture' => $this->faker->imageUrl,
            'status' => $this->faker->randomElement([1, 2]),
            'first_name' => $this->faker->name,
            'last_name' => $this->faker->name,
            'first_name_hira' => $this->faker->name,
            'last_name_hira' => $this->faker->name,
            'sex' => $this->faker->randomElement([1, 2]),
            'zipcode' => Zipcode::inRandomOrder()->first()->zip_code,
            'pre_id' => Prefecture::inRandomOrder()->first()->id,
            'city_id' => City::inRandomOrder()->first()->id,
            'address' => $this->faker->address,
            'town' => $this->faker->address,
            'address_hira' => $this->faker->address,
            'number_phone' => $this->faker->phoneNumber,
            'zipcode2' => Zipcode::inRandomOrder()->first()->zip_code,
            'pre_id2' => Prefecture::inRandomOrder()->first()->id,
            'city_id2' => City::inRandomOrder()->first()->id,
            'address2' => $this->faker->address,
            'town2' => $this->faker->address,
            'address_hira2' => $this->faker->name,
            'number_phone2' => $this->faker->phoneNumber,
            'email2' => $this->faker->email,
            'note' => $this->faker->text,
            'job_situation' => $this->faker->randomElement([0, 1, 2, 3, 4]),
            'dependant' => $this->faker->randomElement([0, 1]),
            'marital_status' => $this->faker->randomElement([0, 1]),
            'info' => $this->faker->text,
            'favourite' => $this->faker->text,
        ];
    }
}
