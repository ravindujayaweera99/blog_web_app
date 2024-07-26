<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <title>All Posts</title>
</head>

<body>
    <x-app-layout>
        <div class="container mx-auto py-12">
            <h1 class="text-3xl font-bold mb-6 text-center uppercase">All Posts</h1>
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border-b">Title</th>
                        <th class="px-4 py-2 border-b lg:block hidden">Image</th>
                        <th class="px-4 py-2 border-b">Published Time</th>
                        <th class="px-4 py-2 border-b">Published By</th>
                        <th class="px-4 py-2 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($posts as $post)
                        <tr>
                            <td class="px-4 py-2 border-b">{{ $post->title }}</td>
                            <td class="px-4 py-2 border-b justify-center items-center lg:flex hidden"><img
                                    src="{{ asset('storage/images/' . $post->image) }}" alt="{{ $post->title }}"
                                    class="hidden md:block h-[50px] w-[100px] my-6 border border-black rounded"></td>
                            <td class="px-4 py-2 border-b">{{$post->created_at->diffForHumans()}}</td>
                            @if ($post->user)
                                <td class="font-normal text-md text-black border-b ">By {{ $post->user->name }}</td>
                            @endif
                            @if (!$post->user)
                                <td class="font-normal text-md text-red-500 border-b ">By Deleted User</td>
                            @endif

                            <td class="px-4 py-2 border-b ">
                                <div class="flex gap-8 justify-center items-center">
                                    <a href="{{ route('singlePost', $post->id) }}"
                                        class="border bg-green-500 text-white font-bold border-green-500 rounded hover:bg-green-600 transition duration-150 ease-in-out px-2 py-1">View
                                    </a>
                                    <form action="{{ route('post.destroy', $post) }}" method="POST"
                                        class="inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button"
                                            class="bg-red-500 text-white px-4 py-2 rounded delete-button">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-app-layout>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteForms = document.querySelectorAll('.delete-form');
            deleteForms.forEach(form => {
                form.querySelector('.delete-button').addEventListener('click', function (event) {
                    event.preventDefault();

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
</body>

</html>