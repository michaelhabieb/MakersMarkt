<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:sidebar sticky stashable class="border-r border-zinc-200 bg-[#4c5c74] dark:border-zinc-700 dark:bg-[#4c5c74] rounded-xl shadow-lg">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <a href="{{ route('dashboard') }}" class="mr-5 flex items-center space-x-2 p-6">
                <!-- Custom Logo with MakersMarkt text (in white) -->
                <span class="text-2xl font-semibold text-white">MakersMarkt</span>
            </a>

            <flux:navlist variant="outline" class="space-y-4">
                <flux:navlist.group :heading="__('Users')" class="grid">
                    <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate class="text-white hover:bg-[#3b4a62] rounded-lg p-3">
                        {{ __('Dashboard') }}
                    </flux:navlist.item>
                </flux:navlist.group>
            </flux:navlist>

            @role('admin')
            <flux:navlist variant="outline" class="space-y-4">
                <flux:navlist.group :heading="__('Admin')" class="grid">
                    <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate class="text-white hover:bg-[#3b4a62] rounded-lg p-3">
                        {{ __('Dashboard') }}
                    </flux:navlist.item>
                    <flux:navlist.item icon="banknotes" :href="route('admins.credits')" :current="request()->routeIs('admins.credits')" wire:navigate class="text-white hover:bg-[#3b4a62] rounded-lg p-3">
                        {{ __('Credits Beheren') }}
                    </flux:navlist.item>
                    <flux:navlist.item icon="home" :href="route('verkopers.index')" :current="request()->routeIs('verkopers.index')" wire:navigate class="text-white hover:bg-[#3b4a62] rounded-lg p-3">
                        {{ __('Products') }}
                    </flux:navlist.item>
                </flux:navlist.group>
            </flux:navlist>
            @endrole

            @role('verkoper')
            <flux:navlist variant="outline" class="space-y-4">
                <flux:navlist.group :heading="__('Verkopers')" class="grid">
                    <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate class="text-white hover:bg-[#3b4a62] rounded-lg p-3">
                        {{ __('Dashboard') }}
                    </flux:navlist.item>
                    <flux:navlist.item icon="home" :href="route('verkopers.index')" :current="request()->routeIs('verkopers.index')" wire:navigate class="text-white hover:bg-[#3b4a62] rounded-lg p-3">
                        {{ __('Products') }}
                    </flux:navlist.item>
                </flux:navlist.group>
            </flux:navlist>
            @endrole

            <flux:spacer />

            <flux:navlist variant="outline" class="space-y-4">
                <!-- Additional navigation items can be added here -->
            </flux:navlist>

            <!-- Desktop User Menu -->
            <flux:dropdown position="bottom" align="start">
                <flux:profile
                    :name="auth()->user()->name"
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevrons-up-down"
                />

                <flux:menu class="w-[220px] bg-[#4c5c74] text-white rounded-lg shadow-lg">
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-left text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-left text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                    <span class="truncate text-xs text-green-500">
                                        {{ __('Credits: €') }}{{ number_format(auth()->user()->credit->amount ?? 0, 2) }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item href="/settings/profile" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full bg-[#3b4a62] text-white py-3 rounded-lg shadow-md">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:sidebar>

        <!-- Mobile User Menu -->
        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:dropdown position="top" align="end">
                <flux:profile :initials="auth()->user()->initials()" icon-trailing="chevron-down" />

                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-left text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-left text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item href="/settings/profile" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full bg-[#3b4a62] text-white py-3 rounded-lg shadow-md">
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
