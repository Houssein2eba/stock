<div class="flex justify-center items-center min-h-screen bg-gray-100 p-6">
    <x-auth-session-status :status="session('status')" />
    <div class="rounded-2xl shadow-xl max-w-xl w-full bg-white p-8">
        <form wire:submit.prevent="updateEmployee" class="space-y-6">
            <!-- Title -->
            <h1 class="text-center text-green-600 font-semibold text-2xl mb-4">Edit Employee</h1>

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" class="font-semibold" />
                <x-text-input wire:model="name" id="name" class="block mt-2 w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500" type="text" autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Phone Number -->
            <div>
                <x-input-label for="phone" :value="__('Phone')" class="font-semibold" />
                <x-text-input wire:model="phone" id="phone" class="block mt-2 w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500" type="text" autocomplete="phone" />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="font-semibold" />
                <x-text-input wire:model="email" id="email" class="block mt-2 w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500" type="email" autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Roles -->
            <div>
                <x-input-label for="role" :value="__('Role')" class="font-semibold" />
                <select wire:model="current_role" id="role" class="block mt-2 w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">
                    <option value="">{{ __('Select Role') }}</option>
                    @foreach ($roles as $key => $role)
                        <option value="{{ $role }}">{{ $role }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('current_role')" class="mt-2" />
            </div>

            <!-- Permissions -->
            <div>
                <x-input-label :value="__('Permissions')" class="font-semibold" />
                <div class="grid grid-cols-2 gap-4 mt-2">
                    @foreach ($permissions as $key => $permission)
                        <label class="flex items-center space-x-2 bg-gray-100 p-3 rounded-lg shadow-sm hover:bg-gray-200 transition duration-300">
                            <input type="checkbox" wire:model="current_permissions" value="{{ $permission }}" class="form-checkbox h-5 w-5 text-green-600">
                            <span class="text-gray-700">{{ $permission }}</span>
                        </label>
                    @endforeach
                </div>
                <x-input-error :messages="$errors->get('current_permissions')" class="mt-2" />
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-center mt-6">
                <button class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg shadow-md transition duration-300">
                    <span wire:loading.remove>{{ __('Update') }}</span>
                    <span wire:loading>
                        <svg class="inline w-5 h-5 text-white animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2v20m10-10H2"></path>
                        </svg>
                        {{ __('Loading...') }}
                    </span>
                </button>
            </div>
        </form>
    </div>
</div>