<x-app-layout>

    <div class="p-4 w-full flex flex-col justify-center items-center">
        <form action="{{ route('allposts') }}" method="GET" class="w-full md:w-1/2">
            <div class="flex flex-col md:flex-row justify-center items-center gap-4">
                <div class="flex flex-wrap gap-4 justify-center">
                    <button type="submit" name="category" value=""
                        class="flex items-center gap-2 px-4 py-2 bg-white text-gray-700 rounded-md border border-gray-300 hover:bg-gray-200 focus:ring focus:ring-purple-300 focus:outline-none focus:border-purple-500">
                        <i class="fas fa-list"></i> All Categories
                    </button>
                    @foreach ($categories as $cat)
                        <button type="submit" name="category" value="{{ $cat->category }}"
                            class="flex items-center  gap-2 px-4 py-2 bg-white text-black rounded-md border border-gray-300 hover:bg-purple hover:text-white focus:ring focus:ring-purple-300 focus:outline-none focus:border-purple-500">
                            {{ $cat->category }}
                        </button>
                    @endforeach
                </div>
            </div>
        </form>
    </div>

    <div class=" py-8 px-32">
        <h1>{{ $allPosts->links() }}</h1>
    </div>

    <div class="flex  justify-center items-center flex-wrap">
        @foreach ($allPosts as $post)
            <a href="{{ route('singlePost', $post->id) }}">
                <div class="relative w-fit text-white group m-3">
                    <div class="text-center">
                        @if ($post->image)
                            <img src="{{ asset('storage/images/' . $post->image) }}" alt="{{ $post->title }}"
                                class="h-[250px] w-[450px] rounded border border-white">
                        @else
                            <div class="h-[200px]  bg-white rounded"></div>
                        @endif
                        <div
                            class="absolute inset-0 flex flex-col justify-center items-center bg-black bg-opacity-90 opacity-80 lg:opacity-80 group-hover:opacity-100 transition-opacity duration-700">
                            <div class="font-bold text-5xl mb-2 uppercase px-6">{{ $post->title }}</div>
                            <div class="font-bold text-lg uppercase my-2 text-purple">Category: {{ $post->category }}
                            </div>
                            <div>
                                @if ($post->user)
                                    <div class="font-normal text-md text-white">By {{ $post->user->name }}</div>
                                @endif
                                @if (!$post->user)
                                    <div class="font-normal text-md text-white">By Deleted User</div>
                                @endif
                                <div class="font-normal text-sm my-2 text-white">Posted
                                    {{ $post->created_at->diffForHumans() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    <div class=" py-8 px-32">
        <h1>{{ $allPosts->links() }}</h1>
    </div>

</x-app-layout>

@include('includes/footer')