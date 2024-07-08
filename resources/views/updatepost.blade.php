<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 text-center mb-6">
            <div>
                {{ __('Edit this Blog') }}
            </div>
        </h2>

        <div class="flex justify-center items-center">
            <form action="{{ route('post.update', $post->id) }}" method="post"
                class="flex flex-col justify-center items-center md:block border border-black/10 px-6 py-12 shadow-md"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="flex justify-between items-center gap-16 mb-6">
                    <label for="title">Title: </label>
                    <input type="text" name="title" value="{{ $post->title }}" class="border p-2">
                </div>
                <div class="mb-3">
                    <label for="inputImage" class="form-label"><strong>Image:</strong></label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                        id="inputImage">
                    @error('image')
                        <div class="form-text text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex justify-between items-center mb-6">
                    <label for="title">Content: </label>
                    <input type="text" name="body" value="{{ $post->body }}" class="border p-2">
                </div>
                <div class="flex justify-center items-center">
                    <button type="submit" class="mt-6 md:mt-0 md:ml-6 bg-blue-500 text-white px-2 py-1 ">Update</button>
                </div>
            </form>

        </div>

    </x-slot>

    @include('includes/footer');

</x-app-layout>