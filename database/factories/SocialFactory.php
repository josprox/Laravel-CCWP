<?php

namespace Database\Factories;

use App\Models\Social;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SocialFactory extends Factory
{
    protected $model = Social::class;

    public function definition()
    {
        return [
			'id_usuario' => $this->faker->name,
			'info_datos' => $this->faker->name,
			'fb' => $this->faker->name,
			'twt' => $this->faker->name,
			'inst' => $this->faker->name,
        ];
    }
}
