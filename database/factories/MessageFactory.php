<?php

namespace Database\Factories;

use App\Models\Conversation;
use App\Models\Utilisateur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user_ids=Utilisateur::all()->pluck('id');
        return [
            'content'=>$this->faker->text('200'),
            "sender_id"=>$this->faker->randomElement($user_ids),
            "receiver_id"=>$this->faker->randomElement($user_ids),

        ];
    }
}
