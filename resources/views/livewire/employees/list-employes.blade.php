
<div >
    <div class="bg-white shadow w-full">
        <div class="max-w-2xl  py-6 px-4 sm:px-6 lg:px-8">
             <x-input-label :value="__('Search')" />
                <label>{{$search}}</label>
                <x-text-input wire:model.live="search" id="search" class="block mt-1 w-full" type="text" name="search"  autofocus autocomplete="search" />
             
        </div>
    
        
    </div>
<div class="flex justify-center py-6 h-fit">
    <div class="w-full max-w-4xl px-4 py-6 bg-white shadow-md rounded-lg">
        <table class="table-auto w-full border-collapse">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-b">{{__('Name')}}</th>
                    <th class="px-4 py-2 border-b">{{__('Telephone')}}</th>
                    <th class="px-4 py-2 border-b">{{__('Role')}}</th>
                    <th class="px-4 py-2 border-b">{{__('Salary')}}</th>
                    <th class="px-4 py-2 border-b">{{__('Status')}}</th>
                    <th class="px-4 py-2 border-b">{{__('Actions')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        
                        <td class="px-4 py-2 border-b">{{ $employee->name }}</td>
                        <td class="px-4 py-2 border-b">{{ $employee->phone }}</td>
                        <td class="px-4 py-2 border-b">{{ $employee->roles->first()->name}}</td>
                        <td class="px-4 py-2 border-b">{{ $employee->salary }}</td>
                        <td class="px-4 py-2 border-b">{{ $employee->status   }}</td>
                        <td class="px-4 py-2 border-b">
                            <a href="#" class="text-blue-500 hover:underline">{{__('Edit')}}</a>
                            <a href="#" class="text-red-500 hover:underline ml-4">{{__('Delete')}}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
