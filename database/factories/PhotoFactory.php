<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Photo;

class PhotoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Photo::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'filename' => $this->faker->word(),
            'filepath' => $this->faker->text(),
            'description' => $this->faker->text(),
        ];
    }
}
