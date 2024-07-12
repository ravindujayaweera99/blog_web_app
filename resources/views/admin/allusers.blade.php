<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <title>All Users</title>
</head>

<body>
    <x-app-layout>
        <div class=" h-[100vh]">
            <div class="flex flex-col justify-center items-center">
                <a href={{route('admin.createuser')}}
                    class=" bg-purple text-md font-bold py-4 px-6 rounded text-white my-8 hover:text-black">Create
                    User / Create Admin</a>
                <h1 class="my-4 font-bold text-2xl uppercase">Current Users</h1>
                <table class="w-[70vw] text-center font-medium">
                    <tr class="bg-purple text-white border">
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>User Type</th>
                        <th>Created Time</th>
                        <th>Actions</th>
                    </tr>
                    @foreach ($allusers as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            @if ($user->usertype === 'admin')
                                <td class="uppercase text-red-500">{{$user->usertype}}</td>
                            @endif
                            @if ($user->usertype === 'user')
                                <td class="uppercase text-blue-500">{{$user->usertype}}</td>
                            @endif
                            <td class="">
                                {{$user->created_at->diffForHumans()}}
                            </td>
                            <td>
                                <div class="flex justify-center items-center gap-8">
                                    <a href=""
                                        class="border bg-blue-500 -blue-500 rounded text-white px-2 py-0 hover:bg-blue-500 hover:text-black transition duration-150 ease-in-out my-1 cursor-pointer">Edit</a>
                                    <form action="{{ route('admin.destroy', $user->id) }}" method="post"
                                        class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button"
                                            class="delete-button  bg-red-500 border-red-500 rounded text-white px-2 py-0 hover:bg-red-500 hover:text-black transition duration-150 ease-in-out cursor-pointer">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>

            </div>
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