<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-center items-center gap-32">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div
                        class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8 lg:p-16 flex flex-col justify-center items-center border-2 border-purple">
                        <h3 class="text-md lg:text-2xl font-semibold mb-4">Overall Statistics</h3>
                        <div class="grid grid-cols-2 gap-12">
                            <div class="border border-purple p-7 rounded-lg text-center">
                                <p class="text-2xl lg:text-5xl text-purple">{{ $userCount }}</p>
                                <h4 class="text-sm lg:text-xl font-semibold">Total Users</h4>
                            </div>
                            <div class="border border-purple p-7 rounded-lg text-center">
                                <p class="text-2xl lg:text-5xl text-purple">{{ $postCount }}</p>
                                <h4 class="text-sm lg:text-xl font-semibold">Total Posts</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="flex flex-col lg:flex-row justify-center items-center lg:gap-8">
            <a href={{route('admin.createuser')}}
                class=" bg-purple text-md font-bold py-2 px-4 lg:py-4 lg:px-6 rounded text-white my-4 hover:text-black">Create
                User / Create Admin</a>


            <a href={{route('admin.userlist')}}
                class=" bg-purple text-md font-bold py-2 px-4 lg:py-4 lg:px-6rounded text-white my-4 hover:text-black">View
                Registerd
                Users</a>

            <a href={{route('admin.allposts')}}
                class=" bg-purple text-md font-bold py-2 px-4 lg:py-4 lg:px-6 rounded text-white my-4 hover:text-black">View
                All
                Posts</a>
        </div>
    </x-slot>
</x-app-layout>