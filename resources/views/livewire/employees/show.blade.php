<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __(request()->route()->getName()) }}
    </h2>
</x-slot>

<div class="flex justify-center items-center min-h-screen">
    <div class="rounded-lg shadow-lg max-w-xl m-auto bg-white p-6 mt-10">
        <form wire:submit.prevent="updateEmployee">
            <!-- Title -->
            <h1 class="text-center text-green-500 font-normal text-lg mb-4">Edit Employee</h1>

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Phone Number -->
            <div class="mt-4">
                <x-input-label for="phone" :value="__('Phone')" />
                <x-text-input wire:model="phone" id="phone" class="block mt-1 w-full" type="text" autocomplete="phone" />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Roles -->
            <div class="mt-4">
                <x-input-label for="role" :value="__('Role')" />
                <select wire:model="current_role" id="role" class="block mt-1 w-full">
                    <option value="">{{ __('Select Role') }}</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('current_role')" class="mt-2" />
            </div>

            <!-- Permissions -->
            <div class="mt-4">
                <x-input-label :value="__('Permissions')" />
                <div class="flex flex-wrap gap-3">
                   
                    @foreach ($permissions as $permission)
                    
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" wire:model="current_permissions" value="{{ $permission->name }}" class="form-checkbox h-5 w-5 text-indigo-600">
                            <span>{{ $permission->name }}</span>
                        </label>
                    @endforeach
                </div>
                <x-input-error :messages="$errors->get('current_permissions')" class="mt-2" />
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-end mt-6">
                <x-primary-button wire:loading.attr="disabled">
                    <span wire:loading.remove>{{ __('Update') }}</span>
                    <span wire:loading>
                        <svg class="inline w-5 h-5 text-white animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2v20m10-10H2"></path>
                        </svg>
                        {{ __('Loading...') }}
                    </span>
                </x-primary-button>
            </div>
        </form>
    </div>
</div>
