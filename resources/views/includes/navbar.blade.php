<header class="flex flex-col md:flex-row justify-between items-center py-6 px-32 shadow-md font-bold  text-black">
    <a href={{route('welcome')}}>
        <h1 class="text-md md:text-3xl text-purple">✍🏻 My Blog App</h1>
    </a>
    @if (Route::has('login'))
        <div class="-mx-3 flex flex-1 justify-end">
            <a href={{route('aboutus')}}
                class="list-none rounded-md px-3 py-2 text-black text-center text-sm my-auto md:text-sm ring-1 ring-transparent transition hover:text-purple focus:outline-none focus-visible:ring-[#FF2D20] ">
                <li>About Us</li>
            </a>
            <a href={{route('contactus')}}
                class="list-none rounded-md px-3 py-2 text-black text-center  text-sm my-auto md:text-sm ring-1 ring-transparent transition hover:text-purple focus:outline-none focus-visible:ring-[#FF2D20] ">
                <li>Give your Feedback</li>
            </a>
            @auth
                <a href="{{ url('/dashboard') }}"
                    class="rounded-md px-3 py-2 bg-purple  text-white text-sm my-auto md:text-sm ring-1 ring-transparent transition hover:text-black focus:outline-none focus-visible:ring-[#FF2D20] ">
                    Dashboard
                </a>

            @else
                <a href="{{ route('login') }}"
                    class="rounded-md px-3 py-2 text-black text-sm my-auto md:text-sm ring-1 ring-transparent transition hover:text-purple focus:outline-none focus-visible:ring-[#FF2D20">
                    Log in
                </a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="bg-purple rounded-md px-3 py-2 text-white text-sm my-auto md:text-sm ring-1 ring-transparent transition hover:text-white focus:outline-none focus-visible:ring-[#FF2D20] hover:bg-black">
                        Register
                    </a>
                @endif
            @endauth

        </div>
    @endif
</header>