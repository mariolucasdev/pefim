<?php

use App\Models\{Category, User};
use Laravel\Sanctum\Sanctum;

test('category can not be created without auth', function () {
    $response = $this->postJson('/api/categories', [
        'name'        => fake()->name,
        'description' => fake()->sentence,
        'type'        => 'expense',
        'essential'   => true,
        'budget'      => 1000,
    ]);

    $response->assertStatus(401);
});

test('category can not be created without all required fields', function () {
    Sanctum::actingAs(User::factory()->create());

    $response = $this->postJson('/api/categories', [
        'description' => fake()->sentence,
    ]);

    $response->assertStatus(422);
});

test('category can be created', function () {
    Sanctum::actingAs(User::factory()->create());

    $response = $this->postJson('/api/categories', [
        'name'        => fake()->name,
        'description' => fake()->sentence,
        'type'        => 'expense',
        'essential'   => true,
        'budget'      => 1000,
    ]);

    $response->assertStatus(201)
        ->assertJsonStructure([
            'name',
            'description',
            'type',
            'essential',
            'budget',
            'user_id',
            'updated_at',
            'created_at',
            'id',
        ]);
});

test('can be listed', function () {
    Sanctum::actingAs(User::factory()->create());

    $response = $this->getJson('/api/categories');

    $response->assertStatus(200)
        ->assertJsonStructure([
            '*' => [
                'name',
                'description',
                'type',
                'essential',
                'budget',
                'user_id',
                'updated_at',
                'created_at',
                'id',
            ],
        ]);
});

test('category can be shown', function () {
    Sanctum::actingAs(User::factory()->create());

    $response = $this->postJson('/api/categories', [
        'name'        => fake()->name,
        'description' => fake()->sentence,
        'type'        => 'expense',
        'essential'   => true,
        'budget'      => 1000,
    ]);

    $category = Category::all()->last();
    $response = $this->getJson("/api/categories/{$category->id}");

    $response->assertStatus(200)
        ->assertJsonStructure([
            'name',
            'description',
            'type',
            'essential',
            'budget',
            'user_id',
            'updated_at',
            'created_at',
            'id',
        ]);
});

test('category can be updated', function () {
    Sanctum::actingAs(User::factory()->create());

    $response = $this->postJson('/api/categories', [
        'name'        => fake()->name,
        'description' => fake()->sentence,
        'type'        => 'expense',
        'essential'   => true,
        'budget'      => 1000,
    ]);

    $category = Category::all()->last();

    $response = $this->putJson("/api/categories/{$category->id}", [
        'name'        => fake()->name,
        'description' => fake()->sentence,
        'type'        => 'income',
        'essential'   => false,
        'budget'      => 2000,
    ]);

    $response->assertStatus(200)
        ->assertJsonStructure([
            'name',
            'description',
            'type',
            'essential',
            'budget',
            'user_id',
            'updated_at',
            'created_at',
            'id',
        ]);
});

test('category can be deleted', function () {
    Sanctum::actingAs(User::factory()->create());

    $response = $this->postJson('/api/categories', [
        'name'        => fake()->name,
        'description' => fake()->sentence,
        'type'        => 'expense',
        'essential'   => true,
        'budget'      => 1000,
    ]);

    $category = Category::all()->last();

    $response = $this->deleteJson("/api/categories/{$category->id}");

    $response->assertStatus(200);
});
