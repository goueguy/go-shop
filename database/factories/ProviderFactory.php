<?php

namespace Database\Factories;

use App\Models\CategoryProvider;
use App\Models\Provider;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProviderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Provider::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'localisation' => $this->faker->address,
            'telephone' => $this->faker->phoneNumber(),
            'category_provider_id'=>2
        ];
    }
}
