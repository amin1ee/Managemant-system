<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Order>
 */
class OrderFactory extends Factory
{
    public function definition(): array
    {
        $street = $this->faker->randomElement([
            'Herestraat',
            'Vismarkt',
            'Grote Markt',
            'Oosterstraat',
            'Oude Ebbingestraat',
            'Nieuwe Ebbingestraat',
            'A-Kerkhof',
            'Brugstraat',
        ]);

        return [
            'name' => $this->faker->name(),
            'telefon' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'adress' => $street.' '.$this->faker->buildingNumber().', Groningen, Netherlands',
            'longitude' => $this->faker->longitude(),
            'latitude' => $this->faker->latitude(),
            'status' => $this->faker->randomElement(['pending', 'processing', 'completed', 'cancelled']),
        ];
    }
}
