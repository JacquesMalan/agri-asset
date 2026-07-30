<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-agri-charcoal antialiased">
        <div class="relative flex min-h-svh items-center justify-center overflow-hidden p-5 sm:p-8">
            <img
                src="{{ asset('images/background/agri-asset-main-bg.jpg') }}"
                alt=""
                class="absolute inset-0 size-full object-cover"
            >
            <div class="absolute inset-0 bg-agri-charcoal/70"></div>

            <div class="relative z-10 flex w-full max-w-[20rem] flex-col gap-4">
                <a href="{{ route('home') }}" class="flex flex-col items-center gap-2 font-medium" wire:navigate>
                    <span class="mb-1 flex size-8 items-center justify-center rounded-md bg-agri-green-600 shadow-sm">
                        <x-app-logo-icon class="size-5 fill-current text-agri-white" />
                    </span>
                    <span class="sr-only">{{ __('welcome.brand') }}</span>
                </a>

                <div class="rounded-2xl bg-agri-white/95 p-6 shadow-2xl backdrop-blur-sm sm:p-7">
                    {{ $slot }}
                </div>
            </div>
        </div>

        @persist('toast')
            <flux:toast.group>
                <flux:toast />
            </flux:toast.group>
        @endpersist

        @fluxScripts
    </body>
</html>
