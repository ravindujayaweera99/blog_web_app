<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 text-center">
            <div>
                {{ __('Give Your Feedback to Us') }}
            </div>
        </h2>

        <div class="lg:w-[50%] mx-auto">

            <!-- <div class="mt-6">
                <x-input-label for="full_name" :value="__('Full Name')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" required autofocus />
            </div>

            <div class="mt-6">
                <x-input-label for="feedback_email" :value="__('Your Email')" />
                <x-text-input id="feedback_email" class="block mt-1 w-full" type="email" name="feedback_email" required
                    autofocus />
            </div>

            <div class="mt-6">
                <x-input-label for="feedback_message" :value="__('Your Feedback')" />
                <x-text-input id="feedback_message" class="block mt-1 w-full" type="email" name="feedback_message"
                    required autofocus />
            </div>

            <div class="mt-6">
                <x-primary-button class="text-[10px]">
                    {{ __('Send your Feedback') }}
                </x-primary-button>
            </div> -->

            <div class="mx-auto sm:px-6 lg:px-8 mt-6 ">
                <div class="bg-white overflow-hidden sm:rounded-lg px-6 border-black/20 shadow-md border-2">
                    <form action={{route('feedback.store')}} method="post"
                        class="flex flex-col justify-center items-center py-6 m-6 ">
                        @csrf
                        <table>
                            <tr class="flex flex-col">
                                <td class="font-bold">Full Name:</td>
                                <td><input type="text" name="full_name" value=""></td>
                            </tr>
                            <tr class="flex flex-col mt-6">
                                <td class="font-bold">Email:</td>
                                <td><input type="text" name="feedback_email" value=""></td>
                            </tr>
                            <tr class="flex flex-col mt-6">
                                <td class="font-bold">Your Feedback:</td>
                                <td><input type="text" name="feedback_message" value=""></td>
                            </tr>
                            <tr class="cursor-pointer">
                                <td class="p-2 mt-6 bg-black text-white flex justify-center items-center ">
                                    <input type="submit" value="Send your Feedback" class="cursor-pointer" />
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </x-slot>

    @include('includes/footer');

</x-app-layout>