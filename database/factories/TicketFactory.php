<?php

namespace Database\Factories;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TicketFactory extends Factory
{
    protected $model = Ticket::class;

    public function definition()
    {
        return [
			'Usuario' => $this->faker->name,
			'Nombre' => $this->faker->name,
			'num_control' => $this->faker->name,
			'Motivo' => $this->faker->name,
			'Mensaje' => $this->faker->name,
        ];
    }
}
