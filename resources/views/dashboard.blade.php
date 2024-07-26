<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 text-center">
            <div>
                {{ __('Dashboard') }}
            </div>
        </h2>
    </x-slot>

    <div class="py-12 flex flex-col justify-center items-center gap-12">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden flex flex-col md:flex-row justify-center items-center gap-6">
                <div class="bg-white shadow-lg rounded-lg border border-purple-200 flex flex-col p-6 w-full max-w-sm">
                    <h1 class="text-lg font-bold">Your Username</h1>
                    <h2 class="text-md text-purple font-semibold">{{ Auth::user()->name }}</h2>
                </div>
                <div class="bg-white shadow-lg rounded-lg border border-purple-200 flex flex-col p-6 w-full max-w-sm">
                    <h1 class="text-lg font-bold">Your Email</h1>
                    <h2 class="text-md text-purple font-semibold">{{ Auth::user()->email }}</h2>
                </div>
                <div class="bg-white shadow-lg rounded-lg border border-purple-200 flex flex-col p-6 w-full max-w-sm">
                    <h2 class="text-5xl text-purple font-bold">{{ $postCount }}</h2>
                    <h1 class="text-md font-bold">Blogs Published</h1>
                </div>
            </div>
        </div>

        <div class="flex flex-col md:flex-row justify-center items-start px-4 md:px-32 w-full">
            <div class="container flex flex-col justify-center items-center mx-auto px-2 md:w-[60%]">
                <a href="{{ route('post.index') }}"
                    class="mb-6 px-4 py-2 bg-purple text-white border border-purple-600 font-bold rounded hover:text-black transition duration-150 ease-in-out">Add
                    New Post</a>
                <h1 class="text-3xl my-6 uppercase text-center">Currently Published Blogs</h1>

                <div class="flex flex-col gap-6 w-full mt-6">
                    @foreach ($userPosts as $userPost)
                        <div
                            class="bg-white text-black rounded-lg overflow-hidden shadow-md flex justify-between items-center p-4">
                            <div class="flex flex-col md:flex-row justify-between items-center w-full">
                                <div class="flex flex-col md:flex-row md:gap-6 items-center">
                                    <div class="font-bold text-sm">{{ $userPost->title }}</div>
                                    <div class="font-bold text-purple text-sm">Category: {{ $userPost->category }}</div>
                                    @if ($userPost->image)
                                        <img src="{{ asset('storage/images/' . $userPost->image) }}"
                                            alt="{{ $userPost->title }}"
                                            class="hidden md:block h-12 w-24 my-2 border border-black rounded">
                                    @else
                                        <div class="h-32 w-32 bg-gray-200 rounded"></div>
                                    @endif
                                    <div class="text-[11px]">Published {{ $userPost->created_at->diffForHumans() }}</div>
                                </div>
                            </div>
                            <div class="flex gap-4">
                                <a href="{{ route('singlePost', $userPost->id) }}"
                                    class="border bg-green-500 text-white font-bold border-green-500 rounded hover:bg-green-600 transition duration-150 ease-in-out px-2 py-1">View
                                </a>

                                <a href="{{ route('post.edit', $userPost->id) }}"
                                    class="border bg-blue-500 text-white font-bold border-blue-500 rounded hover:bg-blue-600 transition duration-150 ease-in-out px-2 py-1">Edit
                                </a>

                                <form action="{{ route('post.destroy', $userPost->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="border bg-red-500 border-red-500 rounded text-white px-2 py-1 hover:bg-red-600  transition duration-150 ease-in-out">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @include('includes/footer');
</x-app-layout>