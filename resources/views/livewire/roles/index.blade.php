<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __(request()->route()->getName()) }}
    </h2>
</x-slot>

<div>

    

    
    <div class="flex justify-center py-6 h-fit">
        
        
    <div class="w-full max-w-4xl px-4 py-6 bg-white shadow-md rounded-lg">
        

        <table class="table-auto w-full border-collapse">
            
            <thead>
                <tr>
                    <th class="px-4 py-2 border-b">{{ __('Role') }}</th>
                    <th class="px-4 py-2 border-b">{{ __('Permissions') }}</th>
                    
                    <th colspan="3" class="px-4 py-2 border-b">{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse($roles as $role)
                    @foreach ($role->permissions as $index => $permission)
                        <tr>
                            @if ($index === 0)
                                <td rowspan="{{ count($role->permissions) }}" class="px-4 py-2 border-b">{{ $role->name }}</td>
                            @endif
                            <td class="px-4 py-2 border-b">{{ $permission->name }}</td>
                            <td class="px-4 py-2 border-b text-red-600"><button wire:click="removePermission({{ $role->id }}, {{ $permission->id }})">Delete</button></td>
                        </tr>
                    @endforeach
                @empty
                    <tr>
                        <td colspan="2" class="text-center py-4 text-gray-500">{{ __('No roles or permissions found') }} ❌</td>
                    </tr>
                @endforelse
            </tbody>
            
        </table>
    </div>


</div>
