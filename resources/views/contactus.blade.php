<html>

<head>
    <title>Send your Feedback</title>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>
    <script type="text/javascript">
        (function () {
            // https://dashboard.emailjs.com/admin/account
            emailjs.init({
                publicKey: "hYV6NWIeqixBmCEBX",
            });
        })();
    </script>
    <script type="text/javascript">
        window.onload = function () {
            document.getElementById('contact-form').addEventListener('submit', function (event) {
                event.preventDefault();
                // these IDs from the previous steps
                emailjs.sendForm('service_a6tbnxh', 'template_7td2nfd', this)
                    .then(() => {
                        console.log('SUCCESS!');
                    }, (error) => {
                        console.log('FAILED...', error);
                    });
            });
        }
    </script>
</head>

<body>
    <x-app-layout>
        <div class="h-[80vh] w-[80%] mx-auto flex flex-col md:flex-row justify-center items-center">
            <div class="md:w-[50%] flex flex-col justify-center items-center">
                <h1 class="text-3xl text-black uppercase mb-6 text-center">We Value your Feedbacks</h1>
                <form action={{route('feedback.store')}} method="post" class="w-[80%]" id="contact-form">
                    @csrf
                    <div class="w-[100%] flex flex-col mb-6">
                        <label for="full_name" class="font-bold">Full Name:</label>
                        <input type="text" name="full_name" value=""
                            class="border-gray-300 focus:border-purple focus:ring-purple focus:bg-purple/5 rounded-md shadow-sm text-purple font-bold">
                    </div>

                    <div class="w-[100%] flex flex-col mb-6">
                        <label for="feedback_email" class="font-bold">Email:</label>
                        <input type="text" name="feedback_email" value=""
                            class="border-gray-300 focus:border-purple focus:ring-purple focus:bg-purple/5 rounded-md shadow-sm text-purple font-bold">
                    </div>

                    <div class="w-[100%] flex flex-col mb-6">
                        <label for="feedback_message" class="font-bold">Your Feedback:</label>
                        <input type="text" name="feedback_message" value=""
                            class="border-gray-300 focus:border-purple focus:ring-purple focus:bg-purple/5 rounded-md shadow-sm text-purple font-bold">
                    </div>

                    <div class="w-[100%] flex flex-col">
                        <input type="submit" value="Send your Feedback"
                            class="inline-flex items-center px-4 py-2 bg-purple border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:text-black focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 cursor-pointer mt-6" />
                    </div>
                </form>
            </div>
            <div>
                <img src="/images/feedback.svg" alt="" class="hidden md:block">
            </div>
        </div>


        @include('includes/footer');

    </x-app-layout>
</body>

</html>