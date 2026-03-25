<?php

namespace Database\Factories;

use App\Models\Members;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Members>
 */
class MembersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fullname' => $this->faker->name(),
            'document_id' => $this->faker->unique()->numerify('##########'),
            'birth_date' => $this->faker->date('Y-m-d', '2010-01-01'),
            'phone' => $this->faker->phoneNumber(),
            'gender' => $this->faker->randomElement(['masculino', 'femenino']),
            'marital_status' => $this->faker->randomElement(['soltero', 'casado', 'viudo', 'divorciado']),
            'ministry' => $this->faker->randomElement(['alabanza', 'jóvenes', 'niños', 'líderes', 'ninguno']),
            'church_role' => $this->faker->randomElement(['miembro', 'visitante', 'líder']),
            'join_date' => $this->faker->date(),
            'status' => 'activo',
            'is_baptized' => $this->faker->boolean(),
            'is_sealed' => $this->faker->boolean(),
        ];
    }
}
