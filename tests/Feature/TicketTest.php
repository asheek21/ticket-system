<?php

use App\Models\Admin;
use App\Models\TicketType;

use function Pest\Laravel\actingAs;

it('can create a ticket', function () {

    $admin = Admin::factory()->create();
    $ticketType = TicketType::factory()->create();

    actingAs($admin)
        ->post('/ticket', [
            'name' => 'test',
            'email' => 'test@gmail.com',
            'subject' => 'can i create subject',
            'description' => 'Issue description',
            'ticket_type_id' => $ticketType->id,
        ])
        ->assertSessionHasNoErrors()
        ->assertRedirect('/');
});

it('cannot create ticket without name', function () {
    $admin = Admin::factory()->create();
    $ticketType = TicketType::factory()->create();

    actingAs($admin)
        ->post('/ticket', [
            'description' => 'Issue description',
            'ticket_type_id' => $ticketType->id,
        ])
        ->assertSessionHasErrors('name');
});
