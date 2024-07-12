<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-center items-center gap-32">
            @include('includes.adminmetric')
            @include('includes.adminmetric')
            @include('includes.adminmetric')
        </div>


        <div class="flex justify-center items-center gap-8">
            <a href={{route('admin.createuser')}}
                class=" bg-purple text-md font-bold py-4 px-6 rounded text-white my-4 hover:text-black">Create
                User / Create Admin</a>


            <a href={{route('admin.userlist')}}
                class=" bg-purple text-md font-bold py-4 px-6 rounded text-white my-4 hover:text-black">View Registerd
                Users</a>
        </div>
    </x-slot>
</x-app-layout>