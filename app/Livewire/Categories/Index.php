<?php

namespace App\Livewire\Categories;

use App\Models\Category;
use Flux\Flux;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Categories')]
class Index extends Component
{
    public string $name = '';

    public string $description = '';

    public function mount(): void
    {
        Gate::authorize('viewAny', Category::class);
    }

    public function save(): void
    {
        Gate::authorize('create', Category::class);

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:100', 'unique:categories,name'],
            'description' => ['nullable', 'string', 'max:1000'],
        ]);

        Category::query()->create($validated);

        $this->reset('name', 'description');

        Flux::toast(variant: 'success', text: __('categories.created'));
    }

    public function render(): View
    {
        return view('livewire.categories.index', [
            'categories' => Category::query()->orderBy('name')->get(),
        ]);
    }
}
