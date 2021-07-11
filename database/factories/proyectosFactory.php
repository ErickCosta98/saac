<?php

namespace Database\Factories;

use App\Models\proyectos;
use Illuminate\Database\Eloquent\Factories\Factory;

class proyectosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = proyectos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'contenido' => $this->faker->text(),
        ];
    }
}
