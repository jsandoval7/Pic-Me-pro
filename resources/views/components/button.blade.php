<button type="button" {{ $attributes->
    merge(['class' => 'inline-block px-3 py-2 border-2 font-medium text-xs
    leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5
    focus:outline-none focus:ring-0 transition duration-150 ease-in-out']) }} >
    {{ $slot }}
</button>
