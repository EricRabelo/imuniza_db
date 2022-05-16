<?php

namespace Database\Factories;
use App\Models\Vacina;

use Illuminate\Database\Eloquent\Factories\Factory;

class VacinaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => 'Pfizer'
        ];
    }
}
