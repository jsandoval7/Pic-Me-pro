<x-layout>
    <section class="overflow-hidden text-gray-700">
        <div class="container px-5 py-2 mx-auto lg:pt-12 lg:px-32">
            <div class="flex flex-wrap -m-1 md:-m-2">
                @unless(count($result) == 0) @foreach ($result as $result)
                <div class="flex flex-wrap w-1/3">
                    <div class="w-full p-1 md:p-2">
                        <img
                            alt="gallery"
                            class="block object-cover object-center w-full h-full rounded-lg"
                            src="{{ asset($result) }}"
                        />
                    </div>
                    <div class="flex w-full flex-wrap justify-evenly">
                        <a href=" /downloadImg/{{ $result }} ">
                            <x-button class="md:border-blue-600 text-blue-600">
                                <i class="fa-regular fa-download"></i>
                                Download</x-button
                            >
                        </a>
                        <form method="POST" action="/deleteImg/{{ $result }}">
                            @csrf @method('Delete')
                            <x-button class="md:border-red-600 text-red-600">
                                <i class="fa-regular fa-trash"></i>
                                Delete</x-button
                            >
                        </form>
                    </div>
                </div>

                @endforeach @else
                <p>No Photos Found</p>
                @endunless
            </div>
        </div>
    </section>
</x-layout>
