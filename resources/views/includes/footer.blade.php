<footer class="bg-gray-100 px-32 border border-black/20">
    <div
        class=" h-full md:h-[20vh] flex flex-col md:flex-row md:gap-32 justify-center md:justify-between items-center md:py-32">
        <div>
            <h1 class="text-md lg:text-xl my-6 md:my-0 md:text-3xl">✍🏻 My Blog App</h1>

        </div>

        <div class="flex flex-col md:flex-row md:gap-44">
            <div class="flex  justify-center items-center my-6 md:my-0">
                <ul class="w-full flex justify-center items-center gap-6">
                    <a href={{route('welcome')}} class="hover:text-blue-500 ">
                        <li>Home</li>
                    </a>
                    <a href={{route('aboutus')}} class="hover:text-blue-500 ">
                        <li>About Us</li>
                    </a>
                    <a href={{route('contactus')}} class="hover:text-blue-500 ">
                        <li>Contact Us</li>
                    </a>
                </ul>
            </div>

            <div>
                <h1 class="text-center lg:text-left">Subscribe to Our News Letter</h1>
                <div class="flex flex-col gap-3 mt-3">
                    <input type="email" placeholder="Your Email" class="w-[250px]">
                    <button class="bg-black px-6 py-3 text-white">Subscribe</button>
                </div>
            </div>
        </div>


    </div>

    <div class="text-center py-2 text-[9px]">
        <h1>Copyright - Ravindu Jayaweera ©️</h1>
        <h2>Last Updated on {{now()->format('Y-m-d')}}</h2>
    </div>
</footer>