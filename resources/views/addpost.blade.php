<head>
    <!-- Include CKEditor 5 from CDN -->
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
</head>

<x-app-layout>

    <div class="lg:w-[80%] h-fit flex justify-center items-center mx-auto sm:px-6 lg:px-8 max-h-[80vh]">
        <div class=" w-[100%] sm:rounded-lg">
            <form action="{{ route('post.store') }}" method="post" class="flex flex-col py-6 md:m-6 gap-6"
                enctype="multipart/form-data">
                <h1 class="font-bold text-2xl">Add New Post</h1>
                @csrf

                <div class="w-[100%] flex flex-col mb-6">
                    <label for="title" class="font-bold">Blog Title</label>
                    <input type="text" name="title" value="">
                </div>

                <div class="w-[100%] flex flex-col mb-6">
                    <label for="body" class="font-bold">Blog Content</label>
                    <textarea name="body"></textarea>
                </div>

                <div class="w-[100%] flex flex-col mb-6">
                    <label for="inputImage" class="form-label font-bold">Blog Image:</label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                        id="inputImage">
                    @error('image')
                        <div class="form-text text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-[100%] flex flex-col mb-6">
                    <input type="submit" value="Publish"
                        class="inline-flex items-center px-4 py-2 bg-purple border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:text-black cursor-pointer focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" />
                </div>

            </form>
        </div>
        <div>
            <img src="/images/addpost.svg" alt="">
        </div>
    </div>



    @include('includes/footer');

    <script>
        // Initialize CKEditor
        ClassicEditor
            .create(document.querySelector('textarea'))
            .then(editor => {
                console.log('Editor was initialized', editor);
            })
            .catch(error => {
                console.error('Error during initialization of the editor', error);
            });
    </script>

</x-app-layout>