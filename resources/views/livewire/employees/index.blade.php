<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __(request()->route()->getName()) }}
    </h2>
</x-slot>

<div x-data="{
        users: [],
        roles: [],
        search: '',
        get filteredUsers() {
            return this.users.filter(user => user.name.toLowerCase().includes(this.search.toLowerCase()));
        }
        
    }"
    x-init="users = await $wire.users"
>
    <div class="bg-white shadow w-full mt-6">
        <div class="max-w-2xl py-6 px-4 sm:px-6 lg:px-8">
            <x-input-label :value="__('Search')" />
            <x-text-input x-model="search" id="search" class="block mt-1 w-full" type="text" name="search" autofocus autocomplete="search" />
        </div>
    </div>

    <div class="flex justify-center py-6 h-fit">
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
                    <template x-for="user in filteredUsers" :key="user.id">
                        <tr x-show="user.roles[0].name !== 'owner'">
                            <td class="px-4 py-2 border-b"><span x-text="user.name"></span></td>
                            <td class="px-4 py-2 border-b"><span x-text="user.phone"></span></td>
                            <td class="px-4 py-2 border-b"><span x-text="user.roles[0].name"></span></td>
                            <td class="px-4 py-2 border-b"><span x-text="user.salary"></span></td>
                            <td class="px-4 py-2 border-b"><span x-text="user.status"></span></td>
                            <td class="px-4 py-2 border-b">
                                <a :href="'editEmployee/' + user.id" class="text-blue-500 hover:underline">{{ __('Edit') }}</a>

                                <a href="#" class="text-red-500 hover:underline ml-4">{{ __('Delete') }}</a>
                                <a href="#" class="text-green-500 hover:underline ml-4">{{ __('Permissions') }}</a>
                            </td>
                        </tr>
                    </template>

                    
                    <tr x-show="filteredUsers.length === 0">
                        <td colspan="6" class="text-center py-4 text-gray-500">{{ __('No users found') }}  ❌   </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
