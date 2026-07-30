<?php

namespace Database\Factories;

use App\Enums\AssetStatus;
use App\Models\Category;
use App\Models\Asset;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Asset>
 */
class AssetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => Category::factory(),
            'asset_number' => strtoupper(fake()->bothify('AST-####')),
            'name' => fake()->words(2, true),
            'make' => fake()->company(),
            'model' => fake()->bothify('Model-###'),
            'serial_number' => fake()->unique()->bothify('SN-########'),
            'purchase_date' => fake()->dateTimeBetween('-5 years', 'now'),
            'status' => AssetStatus::Available,
        ];
    }
}
