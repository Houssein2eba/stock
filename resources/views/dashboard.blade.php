<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
            
           {{ Auth::user()->roles->pluck('name')->first() }}
           
           @foreach (Auth::user()->getPermissionsViaRoles()->pluck('name') as $permission )
               {{ $permission}}
           @endforeach
            {{-- @dd(Auth::user()->getPermissionsViaRoles()->pluck('name')) --}}
            {{-- @dd(Auth::user()->getAllPermissions()->pluck('name','id')) --}}
        </h2>
    </x-slot>

    

   
</x-app-layout>
