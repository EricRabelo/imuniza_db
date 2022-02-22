<?php

namespace Database\Factories;

use App\Models\Pessoa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class PessoaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pessoa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        $faker = Faker::create();

        return [
            'cpf'=>  '22222222222',
            'numeroSus' => $this->faker->randomDigit,
            'nome' => $this->faker->name,
            'nomeMae' => $this->faker->name,
            'sexo' => 'm',
            'cidade' => 'Sao gabriel',
            'estado' => 'ES',
            'endereco' => 'asdhsdfuihad',
            'rua' => 'sdfgasdfga' ,
            'bairro' => 'teste',
            'num' => '2',
            'estadoCivil' => 'soltweiro',
            'etnia' => 'pardo',
            'planoSaude' => '1'
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}