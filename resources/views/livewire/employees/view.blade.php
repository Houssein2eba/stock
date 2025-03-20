
    <div class="w-full max-w-4xl px-4 py-6 bg-white shadow-md rounded-lg">
        

        <table class="table-auto w-full border-collapse">
            
            <thead>
                <tr>
                    <th class="px-4 py-2 border-b">{{ __('Name') }}</th>
                    <th class="px-4 py-2 border-b">{{ __('Telephone') }}</th>
                    <th class="px-4 py-2 border-b">{{ __('Role') }}</th>
                    <th class="px-4 py-2 border-b">{{ __('Status') }}</th>
                    <th colspan="3" class="px-4 py-2 border-b">{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody>
                  

                @foreach($users as $user)
                
                    <tr>
                        <td class="px-4 py-2 border-b">{{ $user->name }}</td>
                        <td class="px-4 py-2 border-b">{{ $user->phone }}</td>
                        <td class="px-4 py-2 border-b">{{ $user->getRoleNames()->implode(', ') }}</td>
                        <td class="px-4 py-2 border-b {{ $user->status=='active' ? 'text-green-600' : 'text-red-600' }}" >{{ $user->status }}</td>
                        <td class="px-4 py-2 border-b">
                            
                                
                            
                            <a href="{{ route('EditEmployee', $user->id) }}" class="text-blue-500 hover:underline" wire:navigate.hover>{{ __('Edit') }}</a>
                            <button wire:confirm="Are you sure you want to delete this user?"
                             wire:click="delete({{ $user->id }})" 
                             class="text-red-500 hover:underline ml-4">
                             {{ __('Delete') }}</button>
                            <a href="#" class="text-green-500 hover:underline ml-4">{{ __('Permissions') }}</a>
                            
                        </td>
                    </tr>
                
                @endforeach
            </tbody>
        </table>
       <div class="mt-4">
    {{ $users->links() }}
</div>


    </div>

