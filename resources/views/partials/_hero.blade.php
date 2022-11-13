<!-- Here Section -->
<section id="hero">
    <!-- Flex Container -->
    <div
        class="container flex flex-col-reverse md:flex-row items-center px-6 mx-auto mt-20 space-y-0 md:space-y-0"
    >
        <!-- Left Item -->
        <div class="flex flex-col mb-32 space-y-12 md:w-1/2">
            <h1
                class="max-w-md text-5xl font-bold text-center md:text-6xl md:text-left"
            >
                Take home your best captured memories
            </h1>
            <p
                class="max-w-sm text-center text-darkGrayishBlue md:text-left text-xl"
            >
                Enjoy your vacation and let us handle the rest by capturing the
                moments that matter most.
            </p>
            <div class="flex justify-center md:justify-start">
                <a
                    href="/register"
                    class="p-3 px-6 pt-2 text-white bg-brightRed rounded-full baseline hover:bg-brightRedLight"
                    >Register</a
                >
            </div>
        </div>
        <!-- Image -->
        <div class="md:w-1/2 bg-brightRedSupLight rounded p-6">
            <img
                class="justify-center content-center"
                src="{{ asset('images/Untitled_Artwork 3.png') }}"
                alt="imageLogossss"
            />
        </div>
    </div>
</section>
