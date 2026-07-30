<?php

namespace App\Models;

use App\Enums\AssetStatus;
use Database\Factories\AssetFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $category_id
 * @property string $asset_number
 * @property string $name
 * @property string|null $make
 * @property string|null $model
 * @property string|null $serial_number
 * @property Carbon|null $purchase_date
 * @property AssetStatus $status
 * @property Category $category
 */
#[Fillable(['category_id', 'asset_number', 'name', 'make', 'model', 'serial_number', 'purchase_date', 'status'])]
class Asset extends Model
{
    /** @use HasFactory<AssetFactory> */
    use HasFactory;

    /**
     * Get the category that contains this asset.
     *
     * @return BelongsTo<Category, $this>
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'purchase_date' => 'date',
            'status' => AssetStatus::class,
        ];
    }
}
