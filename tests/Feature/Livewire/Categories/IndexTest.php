<?php

use App\Enums\UserRole;
use App\Models\Category;
use App\Models\User;
use Livewire\Livewire;

it('allows an asset manager to create a category', function () {
    $user = User::factory()->assetManager()->create();

    $this->actingAs($user);

    Livewire::test('categories.index')
        ->set('name', 'Tractors')
        ->set('description', 'Farm tractors and related equipment.')
        ->call('save')
        ->assertStatus(200);

    $this->assertDatabaseHas('categories', [
        'name' => 'Tractors',
        'description' => 'Farm tractors and related equipment.',
    ]);
});

it('does not allow an employee to manage categories', function () {
    $user = User::factory()->create(['role' => UserRole::Employee]);

    $this->actingAs($user);

    $this->get(route('categories.index'))->assertForbidden();
});

it('requires category names to be unique', function () {
    $user = User::factory()->administrator()->create();
    Category::factory()->create(['name' => 'Vehicles']);

    $this->actingAs($user);

    Livewire::test('categories.index')
        ->set('name', 'Vehicles')
        ->call('save')
        ->assertHasErrors('name');
});
