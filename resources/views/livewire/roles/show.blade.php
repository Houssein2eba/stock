<div class="flex justify-center py-6 h-fit bg-gray-100 min-h-screen">
    <div class="w-full sm:max-w-md mt-6 px-6 py-6 bg-white shadow-lg rounded-xl">
        <h2 class="text-xl font-semibold text-gray-800 text-center">{{ $role }}</h2>
        <hr class="my-4 border-gray-300">
        <form wire:submit.prevent="givePermission" class="space-y-4">
            <div class="grid grid-cols-2 gap-3">
                
                @foreach ($permissions as $key=> $permission)
                    <label class="flex items-center space-x-2 bg-gray-50 p-2 rounded-lg shadow-sm">
                        <input type="checkbox" value="{{ $permission->name }}" wire:model.defer="current_permissions" class="form-checkbox text-blue-500">
                        <span class="text-gray-700">{{ $permission->name }}</span>
                    </label>
                @endforeach
            </div>
            @error('current_permissions')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-300">
                {{ __('Confirm') }}
            </button>
        </form>
    </div>
</div>
