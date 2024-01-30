<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Utilisateur>
 */
class UtilisateurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom'=>$this->faker->lastName(),
            'prenom'=>$this->faker->firstName(),
            'password'=>$this->faker->text(12),
            'email'=>$this->faker->safeEmail(),
            'numero'=>$this->faker->phoneNumber(),
            'photo'=>$this->faker->imageUrl(),
        ];
    }
}
