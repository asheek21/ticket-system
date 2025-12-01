<?php

namespace Database\Factories;

use App\Enums\TicketStatusEnum;
use App\Models\TicketType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->email(),
            'subject' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'ticket_type_id' => TicketType::inRandomOrder()->value('id'),
            'status' => TicketStatusEnum::Open,
        ];
    }
}
