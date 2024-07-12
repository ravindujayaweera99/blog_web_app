<x-guest-layout>

    <div class="container mx-auto flex flex-col lg:flex-row justify-center items-center h-[50vh] w-fit p-6 ">

        <form method="POST" action="{{ route('admin.createuser') }}"
            class="w-[600px] border-2 border-purple px-24 py-8 rounded-lg">
            @csrf

            <!-- Name -->
            <h1 class="text-center text-3xl uppercase mb-6">Create User / Admin</h1>
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- User Type -->
            <div class="mt-4">
                <x-input-label for="usertype" :value="__('User Type')" />
                <select name="usertype" id="usertype" class="block mt-1 w-full rounded border text-purple font-bold">
                    <option value="User">User</option>
                    <option value="Admin">Admin</option>
                </select>
                <x-input-error :messages="$errors->get('usertype')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">


                <x-primary-button class="mx-auto">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>


    </div>
</x-guest-layout>