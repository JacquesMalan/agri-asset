<section class="mx-auto w-full max-w-5xl space-y-8">
    <div>
        <flux:heading size="xl">{{ __('categories.title') }}</flux:heading>
        <flux:text class="mt-2">{{ __('categories.description') }}</flux:text>
    </div>

    <div class="grid gap-8 lg:grid-cols-[minmax(0,1fr)_22rem]">
        <div class="overflow-hidden rounded-xl border border-zinc-200 bg-white dark:border-zinc-700 dark:bg-zinc-900">
            <div class="border-b border-zinc-200 px-6 py-4 dark:border-zinc-700">
                <flux:heading>{{ __('categories.title') }}</flux:heading>
            </div>

            @if ($categories->isEmpty())
                <p class="px-6 py-10 text-sm text-zinc-500 dark:text-zinc-400">{{ __('categories.empty') }}</p>
            @else
                <ul class="divide-y divide-zinc-200 dark:divide-zinc-700">
                    @foreach ($categories as $category)
                        <li class="px-6 py-4">
                            <p class="font-medium text-zinc-950 dark:text-white">{{ $category->name }}</p>
                            @if ($category->description)
                                <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">{{ $category->description }}</p>
                            @endif
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

        <form wire:submit="save" class="rounded-xl border border-zinc-200 bg-white p-6 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:heading>{{ __('categories.create') }}</flux:heading>

            <div class="mt-6 space-y-5">
                <flux:input wire:model="name" :label="__('categories.name')" type="text" required autofocus />

                <flux:textarea
                    wire:model="description"
                    :label="__('categories.category_description')"
                    :description="__('categories.category_description_hint')"
                    rows="4"
                />

                <flux:button variant="primary" type="submit" class="w-full">
                    {{ __('categories.save') }}
                </flux:button>
            </div>
        </form>
    </div>
</section>
