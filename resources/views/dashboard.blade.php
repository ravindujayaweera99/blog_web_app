<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 text-center">
            <div>
                {{ __('Welcome to User Dashboard') }}
            </div>
        </h2>
    </x-slot>

    <div class="py-12 flex flex-col gap-12">
        <div class="w-[100vw] mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden flex justify-center items-center">
                <div class="text-gray-900 flex flex-col md:flex-row">
                    <div class="w-fit flex justify-center items-end">
                        <div
                            class=" text-black rounded border-purple/50 shadow-md border mr-6 w-fit px-6 h-[100%] py-6 flex flex-col justify-center">
                            <h1 class="text-lg font-bold">Your Username</h1>
                            <h2 class="text-md text-purple font-bold">{{ Auth::user()->name }}</h2>
                        </div>
                        <div
                            class="  text-black rounded border-purple/50 shadow-md border w-fit h-[100%] px-6 py-6 flex flex-col justify-center">
                            <h1 class="text-lg font-bold">Your Email</h1>
                            <h2 class="text-md text-purple font-bold">{{ Auth::user()->email }}</h2>
                        </div>
                    </div>

                    <div
                        class=" text-black rounded border-purple/50 shadow-lg border w-fit ml-6 h-[100%] px-6 py-6 flex flex-col justify-center items-center">
                        <h2 class="text-5xl text-purple font-bold">{{ $postCount }}</h2>
                        <h1 class="text-md font-bold">Blogs Published</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col md:flex-row justify-center items-center md:items-start px-32">


            <div class="container flex flex-col justify-center items-center mx-auto px-2 md:w-[60%]">
                <a href={{route('post.index')}}
                    class="mb-6 px-4 py-2 text-purple border border-purple font-bold rounded hover:bg-purple hover:text-white transition duration-150 ease-in-out">Add
                    New
                    Post</a>
                <h1 class="text-3xl my-6 uppercase">Currently Published Blogs</h1>

                <div class="grid grid-cols-3 gap-16 w-[100vw] place-items-center px-32 mt-6">
                    @foreach ($userPosts as $userPost)
                        <div
                            class="bg-main text-black w-[80vw] md:w-[100%] rounded overflow-hidden border-black/50 shadow-md border mb-6 flex flex-col text-center justify-between items-center">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">Title: {{ $userPost->title }}</div>
                                @if ($userPost->image)
                                    <img src="{{ asset('storage/images/' . $userPost->image) }}" alt="{{ $userPost->title }}"
                                        class="h-[200px] w-[90%] mx-auto my-6 border border-black rounded">
                                @else
                                    <div class="h-[200px] w-[90%] mx-auto bg-white my-6 rounded"></div>
                                @endif
                                <p class="text-black text-base">
                                    <b>Content:</b> {{ $userPost->body }}
                                </p>
                            </div>
                            <div class="md:px-6 py-4 flex flex-col md:flex-row gap-4 md:justify-start items-center">
                                <a href={{route('post.edit', $userPost->id)}}
                                    class="mt-6 md:mt-0 md:ml-6 border bg-blue-500 text-white font-bold border-blue-500 rounded hover:text-black px-2 py-1 hover:bg-blue-500 transition duration-150 ease-in-out">Edit
                                    this
                                    Blog</a>

                                <form action="{{ route('post.destroy', $userPost->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="border bg-red-500 border-red-500 rounded text-white px-2 py-1 hover:bg-red-500 hover:text-black transition duration-150 ease-in-out">Delete</button>
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