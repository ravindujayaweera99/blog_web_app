<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 text-center">
            <div>
                {{ __('Dashboard') }}
            </div>
        </h2>
    </x-slot>

    <div class="py-12 flex flex-col justify-center items-center gap-12">
        <div class="w-[100vw] mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden flex justify-center items-center">
                <div class="text-gray-900 flex flex-col md:flex-row shadow-xl">
                    <div class="w-fit flex flex-col lg:flex-row  justify-center items-end">
                        <div
                            class=" text-black rounded border-purple/50 shadow-md border lg:mr-6 lg:w-fit px-6 h-[100%] py-6 flex flex-col justify-center">
                            <h1 class="text-lg font-bold">Your Username</h1>
                            <h2 class="text-md text-purple font-bold">{{ Auth::user()->name }}</h2>
                        </div>
                        <div
                            class="  text-black rounded border-purple/50 shadow-md border lg:w-fit h-[100%] px-6 py-6 flex flex-col justify-center">
                            <h1 class="text-lg font-bold">Your Email</h1>
                            <h2 class="text-md text-purple font-bold">{{ Auth::user()->email }}</h2>
                        </div>
                    </div>

                    <div
                        class=" text-black rounded border-purple/50 shadow-lg border lg:w-fit lg:ml-6 h-[100%] px-6 py-6 flex flex-col justify-center items-center">
                        <h2 class="text-5xl text-purple font-bold">{{ $postCount }}</h2>
                        <h1 class="text-md font-bold">Blogs Published</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col md:flex-row justify-center items-center md:items-start px-32">


            <div class="container flex flex-col justify-center items-center mx-auto px-2 md:w-[60%]">
                <a href={{route('post.index')}}
                    class="mb-6 px-4 py-2 bg-purple text-white border border-purple font-bold rounded hover:bg-purple hover:text-black transition duration-150 ease-in-out">Add
                    New
                    Post</a>
                <h1 class="text-3xl my-6 uppercase text-center">Currently Published Blogs</h1>

                <div class="flex flex-col gap-4 md:gap-16 w-[100vw] px-32 mt-6">
                    @foreach ($userPosts as $userPost)
                        <div
                            class="bg-main text-black w-[100%] rounded overflow-hidden border-black/50 shadow-md border md:flex text-center justify-center md:justify-between items-center py-4 md:py-0">
                            <div class="flex flex-col md:flex-row justify-start items-center md:gap-12 px-4 md:w-[80%]">
                                <div class="font-bold text-sm">{{ $userPost->title }}</div>
                                <div class="font-bold text-purple text-sm">Category: {{$userPost->category}}</div>
                                @if ($userPost->image)
                                    <img src="{{ asset('storage/images/' . $userPost->image) }}" alt="{{ $userPost->title }}"
                                        class="hidden md:block h-[50px] w-[100px] my-6 border border-black rounded">
                                @else
                                    <div class="h-[200px] w-[90%] bg-white my-6 rounded"></div>
                                @endif
                                <div class="text-[11px]">Published {{$userPost->created_at->diffForHumans()}}</div>
                            </div>
                            <div class="md:px-6 py-4 flex gap-4 justify-center items-center w-[100%] md:w-[20%]">
                                <a href={{route('singlePost', $userPost->id)}}
                                    class="md:mt-0  border bg-green-500 text-white font-bold border-green-500 rounded hover:text-black px-2 py-1 hover:bg-green-500 transition duration-150 ease-in-out">View
                                </a>

                                <a href={{route('post.edit', $userPost->id)}}
                                    class=" md:mt-0 border bg-blue-500 text-white font-bold border-blue-500 rounded hover:text-black px-2 py-1 hover:bg-blue-500 transition duration-150 ease-in-out">Edit
                                </a>

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