<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <x-logo></x-logo>
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">PICME</h2>
            <p class="mb-4">Account!</p>
        </header>

        <form method="POST" action="/update_account">
            @csrf @method('PUT')
            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2">
                    Name
                </label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="name"
                    value="{{auth()->user()->name}}"
                />
                @error('name')
                <p class="text-red-500 text-xs mt-1">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2"
                    >Email</label
                >
                <input
                    type="email"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="email"
                    value="{{auth()->user()->email}}"
                />
                @error('email')
                <p class="text-red-500 text-xs mt-1">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password" class="inline-block text-lg mb-2">
                    Password
                </label>
                <input
                    type="password"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="password"
                />
                @error('password')
                <p class="text-red-500 text-xs mt-1">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password2" class="inline-block text-lg mb-2">
                    Confirm Password
                </label>
                <input
                    type="password"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="password_confirmation"
                />
                @error('password_confirmation')
                <p class="text-red-500 text-xs mt-1">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <!-- <x-card class="mt-3 p-2 flex space-x-6 text-center"> -->
            <div class="content-center text-center">
                <button
                    class="bg-transparent hover:bg-violet-600 text-violet-600 font-semibold hover:text-white py-2 px-4 border border-violet-600 hover:border-transparent rounded"
                >
                    <i class="fa-solid fa-pencil"></i> Update Account
                </button>
            </div>
            <!-- </x-card> -->
        </form>
    </x-card>
</x-layout>
