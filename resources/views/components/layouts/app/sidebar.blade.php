<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
        <style>
            /* Forceer witte tekst in sidebar */
            .flux-sidebar {
                color: white !important;
            }

            /* Zorg ervoor dat alle nav-items wit blijven */
            .flux-navlist-item, .flux-navlist-group {
                color: white !important;
            }

            /* Fix hover in zowel dark als light mode */
            .flux-navlist-item:hover {
                background-color: #3b4a62 !important;
            }

            /* Styling voor actieve tab in Light Mode */
            .flux-navlist-item:focus, .flux-navlist-item:active, .flux-navlist-item[current] {
                background-color: #d7d2c1 !important; /* Achtergrondkleur voor actieve tab in Light Mode */
                color: black !important; /* Zwarte tekst voor actieve tab in Light Mode */
            }

            /* Styling voor actieve tab in Dark Mode */
            .flux-navlist-item.dark-mode:focus, .flux-navlist-item.dark-mode:active, .flux-navlist-item.dark-mode[current] {
                background-color: #4c5c74 !important; /* Achtergrondkleur voor actieve tab in Dark Mode */
                color: white !important; /* Witte tekst voor actieve tab in Dark Mode */
            }

            /* Dropdown-menu styling */
            .profile-dropdown {
                background-color: #d7d2c1 !important; /* Steenkleurige achtergrond */
                color: black !important; /* Zwarte tekst voor leesbaarheid */
            }

            /* Hover-effect voor items in het dropdown-menu */
            .profile-dropdown-item:hover {
                background-color: #b8b2a3 !important; /* Lichte tint voor hover effect */
            }

            /* Zorg ervoor dat de gebruikersnaam altijd wit blijft */
            .profile-name {
                color: white !important;
            }

        </style>
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:sidebar 
            sticky stashable 
            class="border-r border-[#4c5c74] bg-[#4c5c74] text-white flux-sidebar"
        >
            <flux:sidebar.toggle class="lg:hidden text-white" icon="x-mark" />

            <a href="{{ route('dashboard') }}" class="mr-5 flex items-center space-x-2 font-semibold text-lg text-white" wire:navigate>
                <span>MakersMarkt</span>
            </a>

            <flux:navlist variant="outline">
                <flux:navlist.group :heading="__('Platform')" class="grid flux-navlist-group">
                    <flux:navlist.item 
                        icon="home" 
                        :href="route('dashboard')" 
                        :current="request()->routeIs('dashboard')" 
                        class="hover:bg-[#3b4a62] rounded-lg transition-all flux-navlist-item"
                        wire:navigate
                    >
                        {{ __('Dashboard') }}
                    </flux:navlist.item>
                </flux:navlist.group>
            </flux:navlist>

            @role('admin')
            <flux:navlist variant="outline">
                <flux:navlist.group :heading="__('Admin Paneel')" class="grid flux-navlist-group">
                    <flux:navlist.item 
                        icon="home" 
                        :href="route('admins.dashboard')" 
                        :current="request()->routeIs('admins.dashboard')" 
                        class="hover:bg-[#3b4a62] rounded-lg transition-all flux-navlist-item"
                        wire:navigate
                    >
                        {{ __('Dashboard') }}
                    </flux:navlist.item>
                    <flux:navlist.item 
                        icon="banknotes" 
                        :href="route('admins.credits')" 
                        :current="request()->routeIs('admins.credits')" 
                        class="hover:bg-[#3b4a62] rounded-lg transition-all flux-navlist-item"
                        wire:navigate
                    >
                        {{ __('Credits Beheren') }}
                    </flux:navlist.item>
                </flux:navlist.group>
            </flux:navlist>
            @endrole

            <flux:spacer />

            <!-- Desktop User Menu -->
            <flux:dropdown position="bottom" align="start">
                <flux:profile
                    :name="auth()->user()->name"
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevrons-up-down"
                    class="profile-name"
                />

                <flux:menu class="w-[220px] profile-dropdown shadow-lg rounded-lg">
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-left text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg bg-[#4c5c74] text-white">
                                    {{ auth()->user()->initials() }}
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
                        <flux:menu.item 
                            href="/settings/profile" 
                            icon="cog" 
                            class="profile-dropdown-item hover:bg-[#b8b2a3] rounded-lg transition-all"
                            wire:navigate
                        >
                            {{ __('Settings') }}
                        </flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item 
                            as="button" 
                            type="submit" 
                            icon="arrow-right-start-on-rectangle" 
                            class="profile-dropdown-item w-full hover:bg-[#b8b2a3] rounded-lg transition-all"
                        >
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:sidebar>

        <!-- Mobile User Menu -->
        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden text-white" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:dropdown position="top" align="end">
                <flux:profile
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevron-down"
                />

                <flux:menu class="w-[220px] profile-dropdown shadow-lg rounded-lg">
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">xx
                            <div class="flex items-center gap-2 px-1 py-1.5 text-left text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg bg-[#4c5c74] text-white">
                                    {{ auth()->user()->initials() }}
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
                        <flux:menu.item 
                            href="/settings/profile" 
                            icon="cog" 
                            class="profile-dropdown-item hover:bg-[#b8b2a3] rounded-lg transition-all"
                            wire:navigate
                        >
                            {{ __('Settings') }}
                        </flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item 
                            as="button" 
                            type="submit" 
                            icon="arrow-right-start-on-rectangle" 
                            class="profile-dropdown-item w-full hover:bg-[#b8b2a3] rounded-lg transition-all"
                        >
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
