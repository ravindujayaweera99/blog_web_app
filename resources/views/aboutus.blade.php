<x-app-layout>
    <x-slot name="header">
        <div class="md:px-32 text-justify">
            <h2 class="font-semibold text-xl text-gray-800 text-center">
                <div>
                    {{ __('Welcome to My Blog App!') }}
                </div>
            </h2>

            <br>

            <div>
                <p>At My Blog App, we believe in the power of words and the impact of sharing ideas, experiences, and
                    stories. Our platform is dedicated to providing a space where writers and readers alike can come
                    together to explore, learn, and grow.</p>
            </div>

            <br>

            <div>
                <h1 class="text-2xl">Our Mission</h1>
                <p>Our mission is to create a community where everyone feels inspired to write and share their unique
                    perspectives. Whether you’re a seasoned writer or just starting, My Blog App offers a supportive
                    environment where your voice can be heard.</p>
            </div>

            <br>

            <div>
                <h1 class="text-2xl">What We Offer</h1>
                <ol>
                    <li><b>Diverse Content:</b> From personal anecdotes to professional insights, our blog covers a wide
                        range of
                        topics to suit all interests.</li>
                    <li><b>Community Engagement:</b> Connect with like-minded individuals, participate in discussions,
                        and
                        provide
                        feedback on others’ work.</li>
                    <li><b>User-Friendly Platform:</b> Our intuitive interface makes it easy to create, edit, and share
                        your
                        posts.
                    </li>
                    <li><b>Support and Resources:</b> We offer resources and tips to help you improve your writing and
                        reach
                        a wider audience.</li>
                </ol>
            </div>

            <br>

            <div>
                <h1 class="text-2xl">Our Values</h1>
                <ol>
                    <li><b>Authenticity:</b> We value genuine and honest expression. Be yourself and share your story in
                        your
                        own
                        words.
                    <li><b>Growth:</b> We believe in continuous learning and improvement, both as individuals and as a
                        community.
                    </li>
                    <li><b>Respect:</b> We foster a respectful and inclusive community where everyone feels welcome.
                    </li>

                </ol>
            </div>

            <br />

            <div>
                <h1 class="text-2xl">Join Us</h1>
                <p>Ready to start your blogging journey? Sign up today and become a part of our vibrant community. Share
                    your thoughts, connect with others, and discover a world of new ideas.</p>
            </div>
        </div>
    </x-slot>

    @include('includes/footer');

</x-app-layout>