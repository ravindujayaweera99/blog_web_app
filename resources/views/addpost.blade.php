<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 text-center mb-6">
            <div>
                {{ __('Create your New Blog') }}
            </div>
        </h2>


        <div class="lg:w-[40%] mx-auto sm:px-6 lg:px-8 flex justify-center items-center">
            <div class="bg-white overflow-hidden sm:rounded-lg px-6 border-black/20 shadow-md border-2">
                <form action="{{ route('post.store') }}" method="post"
                    class="flex flex-col justify-center items-center py-6 md:m-6 ">
                    <h1 class="font-bold text-2xl mb-6">Add New Post</h1>
                    @csrf
                    <table>
                        <tr class="flex flex-col">
                            <td>Title:</td>
                            <td><input type="text" name="title" value=""></td>
                        </tr>
                        <tr class="flex flex-col">
                            <td>Content:</td>
                            <td><input type="text" name="body" value=""></td>
                        </tr>
                        <tr>
                            <td class="p-2 m-6 bg-black text-white flex justify-center items-center cursor-pointer">
                                <input type="submit" value="Publish" />
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </x-slot>

    @include('includes/footer');

</x-app-layout>