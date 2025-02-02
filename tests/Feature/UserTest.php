<?php

test('user can be created', function () {
    $response = $this->postJson('/api/user', [
        'name' => fake()->name,
        'email' => fake()->unique()->safeEmail,
        'password' => 'password',
        'confirm_password' => 'password',
    ]);

    $response->assertStatus(201)
        ->assertJsonStructure([
            'name',
            'email',
            'id',
            'updated_at',
            'created_at',
            'token',
        ]);
});

test('user can be logged in', function () {
    $user = \App\Models\User::factory()->create([
        'id' => fake()->uuid,
        'password' => bcrypt('password'),
    ]);

    $response = $this->postJson('/api/login', [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $response->assertStatus(200)
        ->assertJsonStructure([
            'name',
            'email',
            'id',
            'updated_at',
            'created_at',
            'token',
        ]);
});
