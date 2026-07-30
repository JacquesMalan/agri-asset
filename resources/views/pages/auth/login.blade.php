<x-layouts::auth :title="__('Log in')">
    <div class="flex flex-col gap-6">
        <x-auth-header :title="__('Log in to your account')" :description="__('Enter your email and password below to log in')" />

        <!-- Session Status -->
        <x-auth-session-status class="text-center" :status="session('status')" />


        <form method="POST" action="{{ route('login.store') }}" class="flex flex-col gap-6">
            @csrf

            <!-- Email Address -->
            <flux:input
                name="email"
                :label="__('Email address')"
                :value="old('email')"
                type="email"
                required
                autofocus
                autocomplete="email"
                :placeholder="__('auth.email_placeholder')"
            />

            <!-- Password -->
            <div class="relative">
                <flux:input
                    name="password"
                    :label="__('Password')"
                    type="password"
                    required
                    autocomplete="current-password"
                    :placeholder="__('Password')"
                    viewable
                />

                @if (Route::has('password.request'))
                    <flux:link class="absolute top-0 text-sm end-0" :href="route('password.request')" wire:navigate>
                        {{ __('Forgot your password?') }}
                    </flux:link>
                @endif
            </div>

            <!-- Remember Me -->
            <flux:checkbox name="remember" :label="__('Remember me')" :checked="old('remember')" />

            <div class="flex items-center justify-end">
                <flux:button variant="primary" type="submit" class="w-full" data-test="login-button">
                    {{ __('Log in') }}
                </flux:button>
            </div>
        </form>

        <div class="space-y-3">
            <div class="relative flex items-center py-1">
                <div class="grow border-t border-zinc-200 dark:border-zinc-700"></div>
                <span class="px-3 text-xs text-zinc-500 dark:text-zinc-400">{{ __('auth.or') }}</span>
                <div class="grow border-t border-zinc-200 dark:border-zinc-700"></div>
            </div>

            <form method="POST" action="{{ route('demo.login') }}">
                @csrf
                <flux:button type="submit" class="w-full" data-test="demo-login-button">
                    {{ __('auth.continue_as_guest') }}
                </flux:button>
            </form>

            <p class="text-center text-xs text-zinc-500 dark:text-zinc-400">{{ __('auth.demo_guest_description') }}</p>
        </div>
    </div>
</x-layouts::auth>
