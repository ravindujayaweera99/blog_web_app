<footer class="bg-main text-black px-32 py-16 border border-black/20">
    <div class=" h-[20vh] md:h-[20vh] flex md:flex-row  justify-center md:justify-between items-center">
        <div class="text-center flex gap-32 w-[80%]">
            <h1 class="text-md lg:text-3xl my-6 md:my-0 md:text-3xl">✍🏻 My Blog App</h1>
            <ul class="flex justify-center items-center w-[100%] gap-4 mt-6">
                <a href={{route('welcome')}} class="hover:text-purple text-xl font-bold">
                    <li>Home</li>
                </a>
                <a href={{route('aboutus')}} class="hover:text-purple text-xl font-bold">
                    <li>About Us</li>
                </a>
                <a href={{route('contactus')}} class="hover:text-purple text-xl font-bold">
                    <li>Contact Us</li>
                </a>
            </ul>
        </div>



        <div class="flex flex-col justify-center items-center font-bold">
            <h1 class="text-center lg:text-left">Subscribe to Our News Letter</h1>
            <div class="flex flex-col gap-3 mt-3">
                <input type="email" placeholder="Your Email" class="w-[250px]">
                <button
                    class="border border-black px-6 py-3 text-black hover:bg-black hover:text-white transition duration-150 ease-in-out rounded">Subscribe</button>
            </div>
            <div class="w-full text-center py-2 text-[9px]">
                <h1>Copyright - Ravindu Jayaweera ©️</h1>
                <h2>Last Updated on {{now()->format('Y-m-d')}}</h2>
            </div>
        </div>
    </div>
</footer>