<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{

    protected $model = Contact::class;

    public function definition()
    {
        return [
            'photo_path' => $this->faker->word(),
            'observation' => $this->faker->word(),
            'name' => $this->faker->name(),
            'zip_code' => $this->faker->randomDigit(),
            'public_place' => $this->faker->streetAddress(),
            'number' => $this->faker->randomNumber(),
            'state' => $this->faker->randomLetter(),
            'city' => $this->faker->city(),
            'phone_number' => $this->faker->phoneNumber(),
            'country' => $this->faker->country(),
            'complement' => $this->faker->word(),
        ];
    }
}
