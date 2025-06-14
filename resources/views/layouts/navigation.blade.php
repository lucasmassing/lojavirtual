<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                @auth
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('products')" :active="request()->routeIs('products')">
                        {{ __('Produtos') }}
                    </x-nav-link>
                    <x-nav-link :href="route('types')" :active="request()->routeIs('types')">
                        {{ __('Tipos') }}
                    </x-nav-link>
                    <x-nav-link :href="route('suppliers')" :active="request()->routeIs('suppliers')">
                        {{ __('Fornecedores') }}
                    </x-nav-link>
                </div>
                @endauth
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6 space-x-4">
                @auth
                <!-- Authenticated: Settings Dropdown -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-300 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-white focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
                @else
                <!-- Guest: Login/Register Buttons -->
                <a href="{{ route('login') }}"
                    class="text-sm text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white font-semibold transition duration-150 ease-in-out px-4 py-2 rounded-md">
                    {{ __('Login') }}
                </a>
                <a href="{{ route('register') }}"
                    class="text-sm text-white bg-indigo-600 hover:bg-indigo-700 dark:bg-indigo-500 dark:hover:bg-indigo-600 font-semibold px-4 py-2 rounded-md transition duration-150 ease-in-out">
                    {{ __('Registrar') }}
                </a>
                @endauth
            </div>
        </div>
    </div>
</nav>