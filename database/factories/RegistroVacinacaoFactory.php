<?php

namespace Database\Factories;
use App\Models\RegistroVacinacao;

use Illuminate\Database\Eloquent\Factories\Factory;

class RegistroVacinacaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */


    public function definition()
    {
        return [
            'id_Pessoa' => '22222222222',
            'id_Vacina' => 1,
            'dataVacinacao' => $this->faker->date,
        ];
    }
}
