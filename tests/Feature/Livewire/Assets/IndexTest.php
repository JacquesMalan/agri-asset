<?php

use App\Models\Asset;
use App\Models\Category;
use App\Models\User;
use Livewire\Livewire;

it('allows an asset manager to create an asset', function () {
    $user = User::factory()->assetManager()->create();
    $category = Category::factory()->create(['name' => 'Tractors']);

    $this->actingAs($user);

    Livewire::test('assets.index')
        ->set('assetNumber', 'AST-0001')
        ->set('name', 'John Deere 6M')
        ->set('categoryId', (string) $category->id)
        ->set('make', 'John Deere')
        ->set('model', '6M')
        ->set('serialNumber', 'JD6M-1001')
        ->set('purchaseDate', '2026-07-30')
        ->set('status', 'available')
        ->call('save')
        ->assertHasNoErrors();

    $this->assertDatabaseHas('assets', [
        'category_id' => $category->id,
        'asset_number' => 'AST-0001',
        'name' => 'John Deere 6M',
        'status' => 'available',
    ]);
});

it('requires a unique asset number', function () {
    $user = User::factory()->administrator()->create();
    $asset = Asset::factory()->create(['asset_number' => 'AST-0001']);

    $this->actingAs($user);

    Livewire::test('assets.index')
        ->set('assetNumber', $asset->asset_number)
        ->set('name', 'Duplicate asset')
        ->set('categoryId', (string) $asset->category_id)
        ->call('save')
        ->assertHasErrors('assetNumber');
});

it('does not allow an employee to manage assets', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    $this->get(route('assets.index'))->assertForbidden();
});
