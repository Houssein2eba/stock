<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __(request()->route()->getName()) }}
    </h2>
</x-slot>
<div>
    {{-- <div class="bg-white shadow w-full mt-6">
        <div class="max-w-2xl py-6 px-4 my-4 sm:px-6 lg:px-8">
            <x-input-label :value="__('Search')" />
            <x-text-input wire:model="search" id="search" class="block mt-1 w-full" type="text"  autofocus autocomplete="search" />
        
            <x-primary-button wire:click="searche" class="my-4">{{ __('search') }}</x-primary-button>
            <x-input-label :value="__('Filter by role')" />
    <select wire:model="selectedRole" class="form-select w-2xl">
        <option value="">{{ __('All users') }}</option>
        @foreach($roles as $role)
            <option value="{{ $role->name }}">{{ $role->name }}</option>
        @endforeach
    </select>
        </div>
        
    </div> --}}
    

    
    <div class="flex justify-center py-6 h-fit">
        
        <livewire:employees.view    />
</div>
