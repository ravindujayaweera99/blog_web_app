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
        <div class="h-[100vh]">
            <div class="flex flex-col justify-center items-center">
                <a href={{ route('admin.createuser') }}
                    class="bg-purple text-md font-bold py-4 px-6 rounded text-white my-8 hover:text-black">
                    Create User / Create Admin
                </a>
                <h1 class="my-4 font-bold text-2xl uppercase">Current Users</h1>
                <table class="w-[70vw] text-center font-medium ">
                    <tr class="bg-purple text-white border">
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>User Type</th>
                        <th>Created Time</th>
                        <th>Actions</th>
                    </tr>
                    @foreach ($allusers as $user)
                        <tr class="odd:bg-white even:bg-slate-100">
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            @if ($user->usertype === 'admin')
                                <td class="uppercase text-red-500">{{ $user->usertype }}</td>
                            @endif
                            @if ($user->usertype === 'user')
                                <td class="uppercase text-blue-500">{{ $user->usertype }}</td>
                            @endif
                            <td>
                                {{ $user->created_at->diffForHumans() }}
                            </td>
                            <td>
                                <div class="flex justify-center items-center gap-8">
                                    <a href="#"
                                        class="border bg-blue-500 -blue-500 rounded text-white px-2 py-0 hover:bg-blue-500 hover:text-black transition duration-150 ease-in-out my-1 cursor-pointer"
                                        onclick="openEditForm({{ $user }})">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.destroy', $user->id) }}" method="post"
                                        class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button"
                                            class="delete-button bg-red-500 border-red-500 rounded text-white px-2 py-0 hover:bg-red-500 hover:text-black transition duration-150 ease-in-out cursor-pointer">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>

                <!-- Edit User Form Modal -->
                <div id="editUserModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
                    <div class="flex items-center justify-center min-h-screen">
                        <div
                            class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
                            <div class="px-4 py-5 sm:p-6">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Edit User</h3>
                                <form id="editUserForm" method="post" action="{{ route('admin.updateuser') }}">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" id="editUserId">
                                    <div class="mt-2">
                                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                        <input type="text" name="name" id="editUserName"
                                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                    <div class="mt-2">
                                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                        <input type="email" name="email" id="editUserEmail"
                                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                    <div class="mt-2">
                                        <label for="usertype" class="block text-sm font-medium text-gray-700">User
                                            Type</label>
                                        <select name="usertype" id="editUserType"
                                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <option value="user">User</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>
                                    <div class="mt-5 sm:mt-6">
                                        <button type="submit"
                                            class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">Save</button>
                                    </div>
                                </form>
                                <div class="mt-2">
                                    <button type="button" onclick="closeEditForm()"
                                        class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:text-sm">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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

        function openEditForm(user) {
            document.getElementById('editUserId').value = user.id;
            document.getElementById('editUserName').value = user.name;
            document.getElementById('editUserEmail').value = user.email;
            document.getElementById('editUserType').value = user.usertype;
            document.getElementById('editUserModal').classList.remove('hidden');
        }

        function closeEditForm() {
            document.getElementById('editUserModal').classList.add('hidden');
        }
    </script>
</body>

</html>