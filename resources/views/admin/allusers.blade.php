<x-app-layout>
    <div class=" h-[100vh]">
        <div class="flex flex-col justify-center items-center">
            <a href={{route('admin.createuser')}}
                class=" bg-purple text-md font-bold py-4 px-6 rounded text-white my-4 hover:text-black">Create
                User / Create Admin</a>
            <h1 class="my-4 font-bold text-2xl uppercase">Current Users</h1>
            <table class="w-[50vw] text-center font-bold bg-white">
                <tr class="border border-black">
                    <th class="border-r border-black font-bold text-purple">User Name</th>
                    <th class="border-r border-black font-bold text-purple">User Email</th>
                    <th class="border-r border-black font-bold text-purple">User Type</th>
                </tr>
                @foreach ($allusers as $user)
                    <tr class="border border-black">
                        <td class="border-r border-black">{{$user->name}}</td>
                        <td class="border-r border-black">{{$user->email}}</td>
                        @if ($user->usertype === 'admin')
                            <td class="border-r bg-red-500 border-black">{{$user->usertype}}</td>
                        @endif
                        @if ($user->usertype === 'user')
                            <td class="border-r bg-blue-500 border-black">{{$user->usertype}}</td>
                        @endif
                    </tr>
                @endforeach
            </table>

        </div>
    </div>
</x-app-layout>