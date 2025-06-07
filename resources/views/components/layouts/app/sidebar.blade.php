<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:sidebar sticky stashable class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <!-- Branding -->
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 mb-2 bg-gradient-to-r from-blue-600 to-blue-400 rounded-lg shadow hover:from-blue-700 hover:to-blue-500 transition">
                <img src="{{ asset('images/whycoffee.png') }}" alt="Logo" class="h-8 w-8 rounded-md object-cover" />
                <span class="font-bold text-lg text-white tracking-wide">Why Coffee</span>
            </a>

            <!-- User Info -->
            @auth
                <div class="flex items-center gap-3 px-4 py-3 bg-gradient-to-r from-blue-50 to-blue-100 dark:from-zinc-800 dark:to-zinc-900 rounded-lg shadow mb-4">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=0D8ABC&color=fff" class="h-10 w-10 rounded-full" alt="User">
                    <div>
                        <div class="font-semibold text-blue-900 dark:text-blue-100">{{ auth()->user()->name }}</div>
                        <div class="text-xs text-blue-700 dark:text-blue-300">{{ auth()->user()->email }}</div>
                    </div>
                </div>
            @endauth

            <!-- Menu Section -->
            <flux:navlist variant="outline">
                <flux:navlist.group :heading="__('Platform')" class="grid">
                    <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>
                        {{ __('Dashboard') }}
                    </flux:navlist.item>
                    <flux:navlist.item icon="users" :href="route('staff.index')" :current="request()->routeIs('staff.index')" wire:navigate>
                        {{ __('Staff') }}
                    </flux:navlist.item>
                    <flux:navlist.item icon="list-bullet" :href="route('menu.index')" :current="request()->routeIs('menu.*')" wire:navigate>
                        {{ __('Menu') }}
                    </flux:navlist.item>
                    <flux:navlist.item icon="archive-box" :href="route('bahan-baku.index')" :current="request()->routeIs('bahan-baku.*')" wire:navigate>
                        {{ __('Bahan Baku') }}
                    </flux:navlist.item>
                    <flux:navlist.item icon="chart-bar" :href="route('penjualan.index')" :current="request()->routeIs('penjualan.*')" wire:navigate>
                        {{ __('Penjualan') }}
                    </flux:navlist.item>
                    <flux:navlist.item icon="banknotes" :href="route('pengeluaran.index')" :current="request()->routeIs('pengeluaran.*')" wire:navigate>
                        {{ __('Pengeluaran') }}
                    </flux:navlist.item>
                    <flux:navlist.item icon="clipboard-document-list" :href="route('laporan.index')" :current="request()->routeIs('laporan.*')" wire:navigate>
                        {{ __('Laporan') }}
                    </flux:navlist.item>
                </flux:navlist.group>
            </flux:navlist>

            <flux:spacer />

            {{-- <flux:navlist variant="outline">
                <flux:navlist.item icon="folder-git-2" href="https://github.com/laravel/livewire-starter-kit" target="_blank">
                {{ __('Repository') }}
                </flux:navlist.item>

                <flux:navlist.item icon="book-open-text" href="https://laravel.com/docs/starter-kits#livewire" target="_blank">
                {{ __('Documentation') }}
                </flux:navlist.item>
            </flux:navlist> --}}

            <!-- Desktop User Menu -->
            <flux:dropdown position="bottom" align="start">
                @auth
                    <flux:profile
                        :name="auth()->user()->name"
                        :initials="auth()->user()->initials()"
                        icon-trailing="chevrons-up-down"
                    />

                    <flux:menu class="w-[220px]">
                        <flux:menu.radio.group>
                            <div class="p-0 text-sm font-normal">
                                <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                    <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                        <span
                                            class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                        >
                                            {{ auth()->user()->initials() }}
                                        </span>
                                    </span>

                                    <div class="grid flex-1 text-start text-sm leading-tight">
                                        <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                        <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                    </div>
                                </div>
                            </div>
                        </flux:menu.radio.group>

                        <flux:menu.separator />

                        <flux:menu.radio.group>
                            <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                        </flux:menu.radio.group>

                        <flux:menu.separator />

                        <form method="POST" action="{{ route('logout') }}" class="w-full">
                            @csrf
                            <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                                {{ __('Log Out') }}
                            </flux:menu.item>
                        </form>
                    </flux:menu>
                @else
                    <div class="p-4 text-center text-gray-500">
                        Silakan login untuk mengakses menu user.
                    </div>
                @endauth
            </flux:dropdown>
        </flux:sidebar>

        <!-- Mobile User Menu -->
        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:dropdown position="top" align="end">
                <flux:profile
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevron-down"
                />

                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        {{ $slot }}

        @fluxScripts
    </body>
</html>
