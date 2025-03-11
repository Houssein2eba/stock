<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __(request()->route()->getName()) }}
    </h2>
</x-slot>

<div>
    <div class="bg-white shadow w-full mt-6">
        <div class="max-w-2xl py-6 px-4 sm:px-6 lg:px-8">
            <x-input-label :value="__('Search')" />
            <x-text-input wire:model="search" id="search" class="block mt-1 w-full" type="text"  autofocus autocomplete="search" />
        </div>
    </div>

    <div class="flex justify-center py-6 h-fit">
        <div class="w-full max-w-4xl px-4 py-6 bg-white shadow-md rounded-lg">
            <x-input-label :value="__('Filter by role')" />
            <select wire:model="selectedRole" class="form-select w-full">
                <option value="">{{ __('All users') }}</option>
                @foreach($roles as $role)
                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                @endforeach
            </select>

            <table class="table-auto w-full border-collapse">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border-b">{{ __('Name') }}</th>
                        <th class="px-4 py-2 border-b">{{ __('Telephone') }}</th>
                        <th class="px-4 py-2 border-b">{{ __('Role') }}</th>
                        <th class="px-4 py-2 border-b">{{ __('Salary') }}</th>
                        <th class="px-4 py-2 border-b">{{ __('Status') }}</th>
                        <th colspan="3" class="px-4 py-2 border-b">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td class="px-4 py-2 border-b">{{ $user->name }}</td>
                            <td class="px-4 py-2 border-b">{{ $user->phone }}</td>
                            <td class="px-4 py-2 border-b">{{ $user->getRoleNames()->implode(', ') }}</td>
                            <td class="px-4 py-2 border-b">{{ $user->salary }}</td>
                            <td class="px-4 py-2 border-b">{{ $user->status }}</td>
                            <td class="px-4 py-2 border-b">
                                @role('commercant')
                                @if ($user->getRoleNames()->first() != 'commercant')
                                    
                                
                                <a href="{{ route('EditEmployee', $user->id) }}" class="text-blue-500 hover:underline">{{ __('Edit') }}</a>
                                <button wire:click="delete({{ $user->id }})" class="text-red-500 hover:underline ml-4">{{ __('Delete') }}</button>
                                <a href="#" class="text-green-500 hover:underline ml-4">{{ __('Permissions') }}</a>
                                @endif
                                @endrole
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-gray-500">{{ __('No users found') }} ❌</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
