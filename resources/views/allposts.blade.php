<x-app-layout>

    <div class="p-4 w-full flex flex-col justify-center items-center">
        <form action="{{ route('allposts') }}" method="GET" class="w-full md:w-1/2">
            <div class="flex flex-col md:flex-row justify-center items-center gap-4">
                <select name="category" class="form-select w-full md:w-1/2">
                    <option value="">All Categories</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->category }}" {{ $category == $cat->category ? 'selected' : '' }}>
                            {{ $cat->category }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="bg-purple text-white py-2 px-4 rounded">Filter</button>
            </div>
        </form>
    </div>

    <div class=" py-8 px-32">
        <h1>{{ $allPosts->links() }}</h1>
    </div>

    <div class="flex flex-col justify-center items-center md:grid md:grid-cols-2 lg:grid-cols-3 m-6">
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
                                <div class="font-normal text-md text-white">By {{ $post->user->name }}</div>
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