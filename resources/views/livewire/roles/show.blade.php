<div class="flex justify-center py-6 h-fit">
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <form wire:submit.prevent="givePermission">
        @foreach ($permissions as $permission )
            <label>{{ $permission->name }}</label>
            <input type="checkbox" value="{{ $permission->name }}" wire:model="current_permissions">
            @error('current_permissions')
                <span class="text-red-500 text-xs mt-1">{{$message }}</span>
            @enderror
        @endforeach
        <button  class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            {{ __('Confirm') }}
        </button>
        </form>
    </div>
</div>
