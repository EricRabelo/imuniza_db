<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'whatsapp' => '+5527999999999',
            'email' => 'email@gmail.com',
            'linkedin' => 'https://www.linkedin.com/li',
            'instagram' => 'https://www.insta.com/insta',
            'facebook' => 'https://www.fb.com/fb',
            'phone' => '+5527999999999',
            'opening' => 'Seg - Sexta: 07h às 18h',
            'location' => 'Rodovia BR 101 Norte, Km 60 - Litorâneo, São Mateus - ES, 29932-540',
        ];
    }
}
