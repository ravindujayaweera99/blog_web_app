<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 text-center">
            <div>
                {{ __('Welcome to User Dashboard') }}
            </div>
        </h2>
    </x-slot>

    <div class="py-12 flex flex-col gap-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md border-black/20 border-2 sm:rounded-lg">
                <div class="p-6 text-gray-900 flex flex-col md:flex-row gap-12">
                    <div class="div border-2 w-[100%] px-6 py-6 flex flex-col justify-between">
                        <h1 class="text-2xl">Your Username</h1>
                        <h2 class="text-xl text-blue-700 font-bold">{{ Auth::user()->name }}</h2>
                    </div>
                    <div class="div border-2 w-[100%] px-6 py-6 flex flex-col justify-between">
                        <h1 class="text-2xl">Your Email</h1>
                        <h2 class="text-xl text-blue-700 font-bold">{{ Auth::user()->email }}</h2>
                    </div>
                    <div class="div border-2 w-[100%] px-6 py-6 flex flex-col justify-between">
                        <h1 class="text-2xl">Number of Posts</h1>
                        <h2 class="text-xl text-blue-700 font-bold">{{ $postCount }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col md:flex-row justify-center items-center md:items-start px-32">
            <div class="lg:w-[40%] mx-auto sm:px-6 lg:px-8 flex justify-center items-center">
                <div class="bg-white overflow-hidden sm:rounded-lg px-6 border-black/20 shadow-md border-2">
                    <form action="{{ route('post.store') }}" method="post"
                        class="flex flex-col justify-center items-center py-6 md:m-6 ">
                        <h1 class="font-bold text-2xl mb-6">Add New Post</h1>
                        @csrf
                        <table>
                            <tr class="flex flex-col">
                                <td>Title:</td>
                                <td><input type="text" name="title" value=""></td>
                            </tr>
                            <tr class="flex flex-col">
                                <td>Content:</td>
                                <td><input type="text" name="body" value=""></td>
                            </tr>
                            <tr>
                                <td class="p-2 m-6 bg-black text-white flex justify-center items-center cursor-pointer">
                                    <input type="submit" />
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>

            <div class="container flex flex-col justify-center items-center gap-2 mt-6 mx-auto px-2 md:w-[60%]">
                @foreach ($userPosts as $userPost)
                    <div class="w-[80vw] md:w-[100%] rounded overflow-hidden border-black/20 shadow-md border-2 mb-6">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">Title: {{ $userPost->title }}</div>
                            <p class="text-gray-700 text-base">
                                {{ $userPost->body }}
                            </p>
                        </div>
                        <div class="md:px-6 py-4 flex flex-col md:flex-row gap-4 md:justify-start items-center">
                            <!-- Update Post Form -->
                            <form action="{{ route('post.update', $userPost->id) }}" method="post"
                                class="flex flex-col justify-center items-center md:block">
                                @csrf
                                @method('PUT')
                                <input type="text" name="title" value="{{ $userPost->title }}" class="border p-2">
                                <input type="text" name="body" value="{{ $userPost->body }}" class="border p-2">
                                <button type="submit"
                                    class="mt-6 md:mt-0 md:ml-6 bg-blue-500 text-white px-2 py-1">Update</button>
                            </form>

                            <!-- Delete Post Form -->
                            <form action="{{ route('post.destroy', $userPost->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-2 py-1">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    @include('includes/footer');

</x-app-layout>