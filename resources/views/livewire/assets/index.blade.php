<section class="mx-auto w-full max-w-7xl space-y-8">
    <div>
        <flux:heading size="xl">{{ __('assets.title') }}</flux:heading>
        <flux:text class="mt-2">{{ __('assets.description') }}</flux:text>
    </div>

    <div class="grid gap-8 xl:grid-cols-[minmax(0,1fr)_25rem]">
        <div class="overflow-hidden rounded-xl border border-zinc-200 bg-white dark:border-zinc-700 dark:bg-zinc-900">
            <div class="border-b border-zinc-200 px-6 py-4 dark:border-zinc-700">
                <flux:heading>{{ __('assets.title') }}</flux:heading>
            </div>

            @if ($assets->isEmpty())
                <p class="px-6 py-10 text-sm text-zinc-500 dark:text-zinc-400">{{ __('assets.empty') }}</p>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="border-b border-zinc-200 text-zinc-500 dark:border-zinc-700 dark:text-zinc-400">
                            <tr>
                                <th class="px-6 py-3 font-medium">{{ __('assets.asset_number') }}</th>
                                <th class="px-6 py-3 font-medium">{{ __('assets.name') }}</th>
                                <th class="px-6 py-3 font-medium">{{ __('assets.category') }}</th>
                                <th class="px-6 py-3 font-medium">{{ __('assets.status') }}</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-zinc-200 dark:divide-zinc-700">
                            @foreach ($assets as $asset)
                                <tr>
                                    <td class="whitespace-nowrap px-6 py-4 font-medium text-zinc-950 dark:text-white">{{ $asset->asset_number }}</td>
                                    <td class="px-6 py-4 text-zinc-700 dark:text-zinc-300">
                                        {{ $asset->name }}
                                        @if ($asset->make || $asset->model)
                                            <span class="block text-xs text-zinc-500 dark:text-zinc-400">{{ trim($asset->make.' '.$asset->model) }}</span>
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 text-zinc-700 dark:text-zinc-300">{{ $asset->category->name }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 text-zinc-700 dark:text-zinc-300">{{ __('assets.statuses.'.$asset->status->value) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

        <form wire:submit="save" class="rounded-xl border border-zinc-200 bg-white p-6 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:heading>{{ __('assets.create') }}</flux:heading>

            <div class="mt-6 space-y-5">
                <flux:input wire:model="assetNumber" :label="__('assets.asset_number')" type="text" required autofocus />
                <flux:input wire:model="name" :label="__('assets.name')" type="text" required />

                <flux:select wire:model="categoryId" :label="__('assets.category')" required>
                    <option value="">{{ __('assets.select_category') }}</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </flux:select>

                <div class="grid gap-5 sm:grid-cols-2 xl:grid-cols-1">
                    <flux:input wire:model="make" :label="__('assets.make')" type="text" />
                    <flux:input wire:model="model" :label="__('assets.model')" type="text" />
                </div>

                <flux:input wire:model="serialNumber" :label="__('assets.serial_number')" type="text" />
                <flux:input wire:model="purchaseDate" :label="__('assets.purchase_date')" type="date" />

                <flux:select wire:model="status" :label="__('assets.status')" required>
                    @foreach ($this->statuses() as $value => $label)
                        <option value="{{ $value }}">{{ $label }}</option>
                    @endforeach
                </flux:select>

                <flux:button variant="primary" type="submit" class="w-full">
                    {{ __('assets.save') }}
                </flux:button>
            </div>
        </form>
    </div>
</section>
