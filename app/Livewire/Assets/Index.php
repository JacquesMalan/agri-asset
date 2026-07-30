<?php

namespace App\Livewire\Assets;

use App\Enums\AssetStatus;
use App\Models\Asset;
use App\Models\Category;
use Flux\Flux;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Assets')]
class Index extends Component
{
    public string $categoryId = '';

    public string $assetNumber = '';

    public string $name = '';

    public string $make = '';

    public string $model = '';

    public string $serialNumber = '';

    public string $purchaseDate = '';

    public string $status = 'available';

    public function mount(): void
    {
        Gate::authorize('viewAny', Asset::class);
    }

    public function save(): void
    {
        Gate::authorize('create', Asset::class);

        $validated = $this->validate([
            'categoryId' => ['required', 'integer', Rule::exists('categories', 'id')],
            'assetNumber' => ['required', 'string', 'max:50', Rule::unique('assets', 'asset_number')],
            'name' => ['required', 'string', 'max:150'],
            'make' => ['nullable', 'string', 'max:100'],
            'model' => ['nullable', 'string', 'max:100'],
            'serialNumber' => ['nullable', 'string', 'max:100', Rule::unique('assets', 'serial_number')],
            'purchaseDate' => ['nullable', 'date'],
            'status' => ['required', Rule::enum(AssetStatus::class)],
        ]);

        Asset::query()->create([
            'category_id' => $validated['categoryId'],
            'asset_number' => $validated['assetNumber'],
            'name' => $validated['name'],
            'make' => $validated['make'] ?: null,
            'model' => $validated['model'] ?: null,
            'serial_number' => $validated['serialNumber'] ?: null,
            'purchase_date' => $validated['purchaseDate'] ?: null,
            'status' => $validated['status'],
        ]);

        $this->reset('categoryId', 'assetNumber', 'name', 'make', 'model', 'serialNumber', 'purchaseDate');
        $this->status = AssetStatus::Available->value;

        Flux::toast(variant: 'success', text: __('assets.created'));
    }

    /**
     * @return array<string, string>
     */
    public function statuses(): array
    {
        return collect(AssetStatus::cases())
            ->mapWithKeys(fn (AssetStatus $assetStatus): array => [
                $assetStatus->value => __('assets.statuses.'.$assetStatus->value),
            ])
            ->all();
    }

    public function render(): View
    {
        return view('livewire.assets.index', [
            'assets' => Asset::query()->with('category')->orderBy('asset_number')->get(),
            'categories' => Category::query()->orderBy('name')->get(),
        ]);
    }
}
