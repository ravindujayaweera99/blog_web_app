<head>
    <!-- Include CKEditor 5 from CDN -->
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
</head>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 text-center mb-6">
            <div>
                {{ __('Create your New Blog') }}
            </div>
        </h2>


        <div class="lg:w-[80%] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white w[100%] sm:rounded-lg px-6 border-black/20 shadow-md border-2">
                <form action="{{ route('post.store') }}" method="post" class="flex flex-col py-6 md:m-6 gap-6"
                    enctype="multipart/form-data">
                    <h1 class="font-bold text-2xl">Add New Post</h1>
                    @csrf
                    <table>
                        <tr class="flex flex-col mb-6">
                            <td>Title:</td>
                            <td><input type="text" name="title" value=""></td>
                        </tr>

                        <tr class="flex flex-col mb-6">
                            <td>Content:</td>
                            <td><textarea name="body"></textarea></td>
                        </tr>

                        <!-- <tr class="flex flex-col mb-6">
                            <td>Content:</td>
                            <td class="w-full"><input type="text" name="body" value=""></td>
                        </tr> -->

                        <tr class="flex flex-col mb-6">
                            <td>
                                <div class="mb-3">
                                    <label for="inputImage" class="form-label"><strong>Image:</strong></label>
                                    <input type="file" name="image"
                                        class="form-control @error('image') is-invalid @enderror" id="inputImage">
                                    @error('image')
                                        <div class="form-text text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="p-4 m-6 bg-black rounded text-white text-center cursor-pointer">
                                <input type="submit" value="Publish" />
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </x-slot>



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