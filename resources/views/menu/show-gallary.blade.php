<x-layout>
    <section class="overflow-hidden text-gray-700">
        <div class="container px-5 py-2 mx-auto lg:pt-12 lg:px-32">
            <div class="flex flex-wrap -m-1 md:-m-2">
                @foreach ($result as $result)
                <div class="flex flex-wrap w-1/3">
                    <div class="w-full p-1 md:p-2">
                        <img
                            alt="gallery"
                            class="block object-cover object-center w-full h-full rounded-lg"
                            src="{{ asset($result) }}"
                        />
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</x-layout>
