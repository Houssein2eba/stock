<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __(request()->route()->getName()) }}
        
    </h2>
</x-slot>
<x-auth-session-status class="mb-4" :status="session('status')" />

<div class="items-center justify-center max-h-screen ">
    <div class="rounded-lg shadow-lg max-w-xl m-auto bg-white  p-3 mt-10">
        <form wire:submit.prevent="addEmploye">
            <!-- Name -->
            <h1 class="block mt-4 text-center text-green-500 font-normal ">Add Employee</h1>
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name"  autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <!--Phone number-->
            <div class="mt-4">
                <x-input-label for="phone" :value="__('Phone')" />
                <x-text-input wire:model="phone" id="phone" class="block mt-1 w-full" type="text" name="phone"  autofocus autocomplete="phone" />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>
    
            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email"  autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
    
            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
    
                <x-text-input wire:model="password" id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                 autocomplete="new-password" />
    
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
    
            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
    
                <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation"  autocomplete="new-password" />
    
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="phone" :value="__('Roles')" />
                <select wire:model="role" id="role" class="block mt-1 w-full" name="role" >
                    
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('role')" class="mt-2" />
            </div>
            {{-- <div class="mt-4">
                <x-input-label :value="__('permissions')" />
                <div class="flex flex-wrap gap-2">
                    @foreach ($permissions as $permission)
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" wire:model="selectedPermissions" value="{{ $permission->id }}" class="form-checkbox h-5 w-5 text-indigo-600">
                            <x-input-label :value="$permission->name" />
                        </label>
                    @endforeach
                </div>
                
            </div> --}}

            
            <div class="flex items-center justify-end mt-4">
    
    
                <!-- Register button with loading spinner -->
                <x-primary-button class="ms-4" wire:loading.attr="disabled">
                    <!-- Spinner while loading -->
                    <span wire:loading.remove>
                        {{ __('Add') }}
                    </span>
    
                    <span wire:loading>
                        <!-- Add spinner icon -->
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