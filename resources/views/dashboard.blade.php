<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 text-center">
            <div>
                {{ __('Welcome to User Dashboard') }}
            </div>
        </h2>
    </x-slot>

    <div class="py-12 flex flex-col gap-12">
        <div class="w-[80vw] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md border-black/20 border-2 sm:rounded-lg">
                <div class="p-6 text-gray-900 flex flex-col md:flex-row gap-6">
                    <div class="div border-2 w-[70%] px-6 py-6 flex flex-col justify-center">
                        <div class="div border-2 w-[100%] px-6 py-6 flex flex-col justify-center">
                            <h1 class="text-lg font-bold">Your Username</h1>
                            <h2 class="text-sm text-blue-700 font-bold">{{ Auth::user()->name }}</h2>
                        </div>
                        <div class="div border-2 w-[100%] px-6 py-6 flex flex-col justify-center">
                            <h1 class="text-lg font-bold">Your Email</h1>
                            <h2 class="text-sm text-blue-700 font-bold">{{ Auth::user()->email }}</h2>
                        </div>
                    </div>

                    <div class="div border-2 w-[40%] px-6 py-6 flex flex-col justify-center items-center">
                        <h2 class="text-5xl text-blue-700 font-bold">{{ $postCount }}</h2>
                        <h1 class="text-sm font-bold">Blogs Published</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col md:flex-row justify-center items-center md:items-start px-32">

            <div class="container flex flex-col justify-center items-center mx-auto px-2 md:w-[60%]">
                <h1 class="text-3xl mb-6">Currently Posted Blogs</h1>
                <a href={{route('post.index')}} class="bg-blue-500 mb-6 px-4 py-2 text-white hover:bg-blue-800">Add New
                    Post</a>
                @foreach ($userPosts as $userPost)
                    <div
                        class="w-[80vw] md:w-[90%] rounded overflow-hidden border-black/20 shadow-md border-2 mb-6 flex justify-between items-center">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">Title: {{ $userPost->title }}</div>
                            <p class="text-gray-700 text-base">
                                <b>Content:</b> {{ $userPost->body }}
                            </p>
                        </div>
                        <div class="md:px-6 py-4 flex flex-col md:flex-row gap-4 md:justify-start items-center">
                            <a href={{route('post.edit', $userPost->id)}}
                                class="mt-6 md:mt-0 md:ml-6 bg-blue-500 text-white px-2 py-1 hover:bg-blue-800">Edit this
                                Blog</a>

                            <form action="{{ route('post.destroy', $userPost->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 text-white px-2 py-1 hover:bg-red-800">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    @include('includes/footer');

</x-app-layout>