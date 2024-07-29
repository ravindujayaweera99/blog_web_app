<head>
    <!-- Include CKEditor 5 from CDN -->
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
</head>

<x-app-layout>
    <div class="lg:w-[80%] h-fit flex flex-col lg:flex-row justify-center items-center mx-auto sm:px-6 lg:px-8 py-12">
        <div class="w-full sm:rounded-lg bg-white shadow-lg p-8 lg:p-10">
            <form action="{{ route('post.store') }}" method="post" class="flex flex-col gap-6"
                enctype="multipart/form-data" onsubmit="return validateForm()">
                <h1 class="font-bold text-2xl text-gray-800">Add New Post</h1>
                @csrf

                <div class="flex flex-col mb-6">
                    <label for="title" class="font-bold text-gray-700">Blog Title</label>
                    <input type="text" name="title"
                        class="mt-2 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-purple-500"
                        placeholder="Enter blog title" required>
                </div>

                <div class="flex flex-col mb-6">
                    <label for="category" class="font-bold text-gray-700">Category</label>
                    <select name="category" id="category"
                        class="mt-2 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-purple-500">
                        <option value="Technology">Technology</option>
                        <option value="Travel">Travel</option>
                        <option value="Food">Food</option>
                        <option value="Sports">Sports</option>
                        <option value="E-sports">E-Sports</option>
                    </select>
                </div>

                <div class="flex flex-col mb-6">
                    <label for="body" class="font-bold text-gray-700">Blog Content</label>
                    <textarea name="body" id="body"
                        class="mt-2 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-purple-500"
                        rows="10" placeholder="Write your blog content here"></textarea>
                </div>

                <div class="flex flex-col mb-6">
                    <label for="inputImage" class="font-bold text-gray-700">Blog Image:</label>
                    <input type="file" name="image"
                        class="mt-2 p-2 border border-gray-300 rounded focus:outline-none @error('image')  @enderror"
                        id="inputImage" accept="image/*" required>
                    @error('image')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flex flex-col mb-6">
                    <input type="submit" value="Publish"
                        class="inline-flex items-center justify-center px-4 py-2 bg-purple border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition ease-in-out duration-150 cursor-pointer" />
                </div>
            </form>
        </div>

        <div class="hidden lg:block lg:ml-8">
            <img src="/images/addpost.svg" alt="Add Post" class="w-full max-w-xs">
        </div>
    </div>

    @include('includes/footer');

    <script>
        // Initialize CKEditor
        let editor;
        ClassicEditor
            .create(document.querySelector('textarea'))
            .then(ed => {
                editor = ed;
                console.log('Editor was initialized', editor);
            })
            .catch(error => {
                console.error('Error during initialization of the editor', error);
            });

        // Validate form
        function validateForm() {
            const bodyField = document.querySelector('textarea[name="body"]');
            bodyField.value = editor.getData();
            if (bodyField.value.trim() === '') {
                alert('Blog Content is required');
                return false;
            }
            return true;
        }
    </script>
</x-app-layout>