<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ __('welcome.title') }} - {{ __('welcome.brand') }}</title>

        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-agri-charcoal">
        <div class="relative flex min-h-screen items-center justify-center overflow-hidden p-5 sm:p-8">
            <img
                src="{{ asset('images/background/agri-asset-main-bg.jpg') }}"
                alt=""
                class="absolute inset-0 size-full object-cover"
            >
            <div class="absolute inset-0 bg-agri-charcoal/70"></div>

            <main class="relative z-10 grid min-h-[34rem] w-full max-w-5xl overflow-hidden rounded-3xl bg-agri-white shadow-2xl lg:grid-cols-2">
                <section class="flex flex-col justify-between px-7 py-8 sm:px-10 sm:py-10 lg:px-12 lg:py-12">
                <div>
                    <p class="text-sm font-semibold tracking-[0.2em] text-agri-green-600 uppercase">{{ __('welcome.brand') }}</p>

                    <div class="mt-12 max-w-lg lg:mt-16">
                        <p class="text-sm font-medium text-agri-orange-600">{{ __('welcome.eyebrow') }}</p>
                        <h1 class="mt-4 text-4xl font-semibold tracking-tight text-agri-charcoal sm:text-5xl">{{ __('welcome.heading') }}</h1>
                        <p class="mt-5 max-w-lg text-base leading-7 text-zinc-600">{{ __('welcome.description') }}</p>
                    </div>
                </div>

                <div class="mt-12 flex flex-wrap items-center gap-4">
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="inline-flex items-center rounded-lg bg-agri-green-600 px-5 py-3 text-sm font-semibold text-agri-white transition hover:bg-agri-green-700 focus:outline-none focus:ring-2 focus:ring-agri-green-600 focus:ring-offset-2">
                            {{ __('welcome.sign_in') }}
                        </a>
                    @endif
                    <p class="text-sm text-zinc-500">{{ __('welcome.supporting_text') }}</p>
                </div>
                </section>

                <section class="relative min-h-64 lg:min-h-full">
                    <img
                        src="{{ asset('images/agriasset-farm-hero.png') }}"
                        alt="{{ __('welcome.image_alt') }}"
                        class="absolute inset-0 size-full object-cover"
                    >
                    <div class="absolute inset-0 bg-linear-to-t from-agri-charcoal/45 via-transparent to-transparent"></div>
                </section>
            </main>
        </div>
    </body>
</html>
