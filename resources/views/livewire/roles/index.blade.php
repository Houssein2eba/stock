<x-slot name="header">
    <h2 class="text-2xl font-bold text-gray-800">
        {{ __(request()->route()->getName()) }}
    </h2>
</x-slot>

<div x-data="{ open: true }" class="py-6">
    <div class="flex justify-center">
        <div class="w-full max-w-4xl bg-white shadow-lg rounded-xl p-6">
            <h2 x-show="open" @click="open = false" class="cursor-pointer text-lg font-semibold text-gray-700 mb-4">
                <x-auth-session-status :status="session('status')" />
            </h2>

            <table class="w-full border border-gray-200 rounded-lg overflow-hidden">
                <thead class="bg-gray-100">
                    <tr class="text-left text-gray-700">
                        <th class="px-4 py-3 border-b">{{ __('Role') }}</th>
                        <th class="px-4 py-3 border-b">{{ __('Permissions') }}</th>
                        <th colspan="3" class="px-4 py-3 border-b">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($roles as $role)
                        @foreach ($role->permissions as $index => $permission)
                            <tr class="border-b hover:bg-gray-50">
                                @if ($index === 0)
                                    <td rowspan="{{ count($role->permissions) }}" class="px-4 py-3 font-medium text-gray-900">
                                        <div class="flex items-center gap-2">
                                            {{ $role->name }}
                                            <a  href="{{ route('roles.show', $role->id) }}"  
                                               class="bg-blue-600 text-white px-3 py-1 rounded-md hover:bg-blue-700 transition"
                                               wire:navigate.hover
                                               >
                                                {{ __('Give Permissions') }}
                                            </a>
                                        </div>
                                    </td>
                                @endif
                                <td class="px-4 py-3 text-gray-700">{{ $permission->name }}</td>
                                <td class="px-4 py-3">
                                    <button wire:click="delete({{ $role->id }}, {{ $permission->id }})" 
                                            class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700 transition">
                                        {{ __('Revoke Permission') }}
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-4 text-gray-500">
                                {{ __('No roles or permissions found') }} ❌
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
