<x-app-layout>
    <x-slot name="header">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-gray-50 overflow-hidden shadow-xl sm:rounded-lg p-8 lg:p-8 flex flex-col justify-center items-center border border-gray-200">
                    <h3 class="text-lg lg:text-3xl font-semibold mb-8">Overall Statistics</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="bg-white border border-gray-200 p-8 rounded-lg text-center shadow-md">
                            <p class="text-3xl lg:text-6xl text-purple font-bold">{{ $userCount }}</p>
                            <h4 class="text-lg lg:text-2xl font-semibold mt-4">Total Users</h4>
                        </div>
                        <div class="bg-white border border-gray-200 p-8 rounded-lg text-center shadow-md">
                            <p class="text-3xl lg:text-6xl text-purple font-bold">{{ $postCount }}</p>
                            <h4 class="text-lg lg:text-2xl font-semibold mt-4">Total Posts</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-gray-50 overflow-hidden shadow-xl sm:rounded-lg p-8 lg:p-4 flex flex-col lg:flex-row justify-center items-center lg:gap-8 border border-gray-200">
                    <a href="{{ route('admin.createuser') }}"
                        class="bg-purple text-white font-semibold py-3 px-6 rounded-lg my-4 transition duration-150 ease-in-out hover:text-black">
                        Create User / Admin
                    </a>
                    <a href="{{ route('admin.userlist') }}"
                        class="bg-purple text-white font-semibold py-3 px-6 rounded-lg my-4 transition duration-150 ease-in-out hover:text-black">
                        View Registered Users
                    </a>
                    <a href="{{ route('admin.allposts') }}"
                        class="bg-purple text-white font-semibold py-3 px-6 rounded-lg my-4 transition duration-150 ease-in-out hover:text-black">
                        View All Posts
                    </a>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>

@include ('includes.footer');