<?php

use App\Models\Admin;

it('can render the login screen', function () {
    $this->get('/login')
        ->assertStatus(200);
});

it('allows users to authenticate using the login screen', function () {
    $admin = Admin::factory()->create();

    $response = $this->post('/login', [
        'email' => $admin->email,
        'password' => 'password',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('home', absolute: false));
});

it('does not allow admins to authenticate with invalid password', function () {
    $admin = Admin::factory()->create();

    $this->post('/login', [
        'email' => $admin->email,
        'password' => 'wrong-password',
    ]);

    $this->assertGuest();
});

it('allows users to logout', function () {
    $admin = Admin::factory()->create();

    $response = $this->actingAs($admin)
        ->post('/logout');

    $this->assertGuest();

    $response->assertRedirect('/login');
});
