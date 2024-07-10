<x-app-layout>
    <x-slot name="header">
        <div class="md:px-16 text-justify">
            <h2 class="font-semibold text-xl text-gray-800 text-center">
                <div>
                    {{ __('Welcome to My Blog App!') }}
                </div>
            </h2>

            <br>

            <div class="flex justify-center items-center gap-6 mb-32">
                <p class=" text-md text-center">At My Blog App, we believe in the power of words and the impact of
                    sharing
                    ideas,
                    experiences, and
                    stories. Our platform is dedicated to providing a space where writers and readers alike can come
                    together to explore, learn, and grow.</p>
            </div>


            <div class="flex flex-row-reverse justify-center items-center gap-6 mb-32">
                <div>
                    <h1 class="text-2xl text-center mb-6 font-bold">Our Mission</h1>
                    <p>Our mission is to create a community where everyone feels inspired to write and share their
                        unique
                        perspectives. Whether you’re a seasoned writer or just starting, My Blog App offers a supportive
                        environment where your voice can be heard.</p>
                </div>
                <img src="/images/about1.svg" alt="">
            </div>


            <div class="flex justify-center items-center gap-6 mb-32">
                <div>
                    <h1 class="text-2xl text-center font-bold">What We Offer</h1>
                    <ol class="flex flex-col gap-6 mt-6">
                        <li><b class="text-purple">Diverse Content:</b> From personal anecdotes to professional
                            insights, our blog covers a
                            wide
                            range of
                            topics to suit all interests.</li>
                        <li><b class="text-purple">Community Engagement:</b> Connect with like-minded individuals,
                            participate in
                            discussions,
                            and
                            provide
                            feedback on others’ work.</li>
                        <li><b class="text-purple">User-Friendly Platform:</b> Our intuitive interface makes it easy to
                            create, edit, and
                            share
                            your
                            posts.
                        </li>
                        <li><b class="text-purple">Support and Resources:</b> We offer resources and tips to help you
                            improve your writing
                            and
                            reach
                            a wider audience.</li>
                    </ol>
                </div>
                <div>
                    <img src="/images/about2.svg" alt="">
                </div>
            </div>


            <div class="flex flex-row-reverse justify-center items-center mb-32">
                <div>
                    <h1 class="text-2xl text-center font-bold">Our Values</h1>
                    <ol class="flex flex-col gap-6 mt-6">
                        <li><b class="text-purple">Authenticity:</b> We value genuine and honest expression. Be yourself
                            and share your
                            story in
                            your
                            own
                            words.
                        <li><b class="text-purple">Growth:</b> We believe in continuous learning and improvement, both
                            as individuals and as
                            a
                            community.
                        </li>
                        <li><b class="text-purple">Respect:</b> We foster a respectful and inclusive community where
                            everyone feels welcome.
                        </li>

                    </ol>
                </div>
                <div>
                    <img src="/images/about3.svg" alt="">
                </div>
            </div>


            <div class="flex flex-col justify-center items-center mb-32">
                <h1 class="text-2xl font-bold">Join Us</h1>
                <p>Ready to start your blogging journey? Sign up today and become a part of our vibrant community. Share
                    your thoughts, connect with others, and discover a world of new ideas.</p>
                <a href={{route('register')}}
                    class="bg-purple px-6 py-3 rounded text-white hover:text-black mb-32">Become a
                    Member</a>
                <img src="/images/about4.svg" alt="">
            </div>
        </div>
    </x-slot>

    @include('includes/footer');

</x-app-layout>

