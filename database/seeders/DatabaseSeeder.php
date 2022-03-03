<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    

    public function run()
    {
        //\App\Models\About::factory(1)->create();
        //\App\Models\Contact::factory(1)->create();
        //\App\Models\RegistroVacinacao::factory(1)->create();
        
        //Criando Usuario
        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@imuniza.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'), // password
            'remember_token' => Str::random(10),
        ]);

        //Criando Fabricantes
        \App\Models\Fabricante::create(['cnpj' => '1', 'razaoSocial' => 'Zezinho das Vacinas']);
        \App\Models\Fabricante::create(['cnpj' => '2', 'razaoSocial' => 'Eric Fabricante']);
        \App\Models\Fabricante::create(['cnpj' => '3', 'razaoSocial' => 'FioCruz']);

        //Criando Vacinas
        \App\Models\Vacina::create(['nome' => 'Pfizer']);
        \App\Models\Vacina::create(['nome' => 'Astrazeneca']);
        \App\Models\Vacina::create(['nome' => 'Influenza']);
        \App\Models\Vacina::create(['nome' => 'CoronaVac']);

        //Criando Doenças
        \App\Models\Doenca::create(['nome' => 'Covid']);
        \App\Models\Doenca::create(['nome' => 'Gripe']);
        \App\Models\Doenca::create(['nome' => 'Paralisia']);
        \App\Models\Doenca::create(['nome' => 'Febre Amarela']);

        //Criando pessoas
        $faker = Faker::create();
        for($i=0; $i<=20; $i++){
            \App\Models\Pessoa::create(['cpf'=>  $i,
            'numeroSus' => $faker->unique()->randomNumber,
            'nome' => $faker->name,
            'nomeMae' => $faker->name,
            'sexo' => 'M',
            'cidade' => 'Sao gabriel',
            'estado' => 'ES',
            'rua' => 'sdfgasdfga' ,
            'bairro' => 'teste',
            'num' => $i,
            'estadoCivil' => 'soltweiro',
            'etnia' => 'pardo',
            'planoSaude' => '1']);
        }

    }
}
