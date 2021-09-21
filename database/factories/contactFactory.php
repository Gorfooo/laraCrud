<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{

    protected $model = Contact::class;

    public function definition()
    {
        $this->faker = \Faker\Factory::create('pt_BR');
        return [
            'photo_path' => 'storage/photos/default__user.png',
            'observation' => $this->faker->word(),
            'name' => $this->faker->name(),
            'zip_code' => '89707-091',
            'public_place' => $this->faker->streetAddress(),
            'number' => $this->faker->randomNumber(6),
            'state' => $this->faker->stateAbbr,
            'city' => $this->faker->city(),
            'phone_number' => $this->faker->phoneNumber(),
            'country' => $this->faker->country(),
            'complement' => $this->faker->word(),
        ];
    }
}
