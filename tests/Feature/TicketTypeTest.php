<?php

use App\Enums\AdminRoleEnum;
use App\Models\Admin;

use function Pest\Laravel\actingAs;

it('can create a ticket type', function () {
    $admin = Admin::factory()->create();

    actingAs($admin)
        ->post('/ticket-type', [
            'type' => 'Support',
            'database_name' => 'support',
        ])
        ->assertRedirect();

    $this->assertDatabaseHas('ticket_types', ['type' => 'Support']);
});

it('cannot create ticket type with missing database name', function () {
    $admin = Admin::factory()->create();

    actingAs($admin)
        ->post('/ticket-type', [
            'type' => 'Support',
        ])
        ->assertSessionHasErrors('database_name');
});

it('regular user cannot create ticket type', function () {
    $admin = Admin::factory()->create([
        'role' => AdminRoleEnum::Admin,
    ]);

    actingAs($admin)
        ->post('/ticket-type', [
            'type' => 'Support',
            'database_name' => 'support',
        ])
        ->assertForbidden();
});
