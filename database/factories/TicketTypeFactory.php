<?php

namespace Database\Factories;

use App\Enums\TicketTypeStatusEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TicketType>
 */
class TicketTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => 'Support',
            'database_name' => 'support',
            'migration_status' => TicketTypeStatusEnum::Completed,
        ];
    }
}
