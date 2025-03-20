
<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();
        $this->redirect('/', ['navigate' => true]);
    }
};
?>

<nav x-data="{ open: false, employeesDropdownOpen: false, productsDropdownOpen: false }" class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" wire:navigate.hover>
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>
                
                <div class="space-x-8 sm:-my-px sm:ms-10 flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate.hover>
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    
                    <!-- Employees Dropdown -->
                    <div class="relative shrink-0 flex items-center ">
                        <button  @click = " employeesDropdownOpen = !employeesDropdownOpen" class="{{ Str::contains(request()->route()->getName(), 'ploye') ? 'text-blue-700' : 'text-gray-500' }} inline-flex items-center px-3 py-2 text-sm font-medium  hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            
                            {{ __('Employees') }}
                            
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="employeesDropdownOpen" @click.away="employeesDropdownOpen = false" class="absolute top-4 z-50 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                            <x-dropdown-link  :href="route('listEmployes')" wire:navigate.hover>{{ __('View Employees') }}</x-dropdown-link>
                            <x-dropdown-link :href="route('addEmploye')" wire:navigate.hover>{{ __('Add Employee') }}</x-dropdown-link>
                        
                        </div>
                    </div>
                    
                    <!-- Products Dropdown -->
                    <div class="relative shrink-0 flex items-center">
                        <button @click="productsDropdownOpen = !productsDropdownOpen" class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-500 hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            {{ __('Products') }}
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="productsDropdownOpen" @click.away="productsDropdownOpen = false" class="absolute top-4 z-10 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                            <x-dropdown-link href="/home" wire:navigate.hover>{{ __('View Products') }}</x-dropdown-link>
                            <x-dropdown-link href="/home" wire:navigate.hover>{{ __('Add Product') }}</x-dropdown-link>
                        
                        </div>
                    </div>
                    <x-nav-link :href="route('roles.index')" :active="request()->routeIs('roles.index')" wire:navigate.hover>
                        {{ __('Roles and Permissions') }}
                    </x-nav-link>
                </div>
            </div>
            
            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <span x-data="{ name: '{{ auth()->user()->name }}' }" x-text="name"></span>
                            <svg class="ms-1 h-4 w-4 fill-current" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile')" wire:navigate.hover>{{ __('Profile') }}</x-dropdown-link>
                        <button wire:click="logout" class="w-full text-start">
                            <x-dropdown-link>{{ __('Log Out') }}</x-dropdown-link>
                        </button>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>
