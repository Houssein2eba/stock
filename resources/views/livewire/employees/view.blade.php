
    <div class="w-full max-w-4xl px-4 py-6 bg-white shadow-md rounded-lg">
        

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
                        <td class="px-4 py-2 border-b" >{{ $user->salary }}</td>
                        <td class="px-4 py-2 border-b {{ $user->status=='active' ? 'text-green-600' : 'text-red-600' }}" >{{ $user->status }}</td>
                        <td class="px-4 py-2 border-b">
                            @role('commercant')
                            @if ($user->getRoleNames()->first() != 'commercant')
                                
                            
                            <a href="{{ route('EditEmployee', $user->id) }}" class="text-blue-500 hover:underline">{{ __('Edit') }}</a>
                            <button wire:confirm="Are you sure you want to delete this user?"
                             wire:click="delete({{ $user->id }})" 
                             class="text-red-500 hover:underline ml-4">
                             {{ __('Delete') }}</button>
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

