<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />
        
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
         @vite('resources/css/app.css')   
        <script src="//unpkg.com/alpinejs" defer></script>
        <title>PicMe | Capstone Project</title>
    </head>
    <body class="mb-48">
        <nav class="flex justify-between items-center text-white mb-4 bg-violet-600" >
            <a href="/"
                ><img
                    class="w-28 object-fill transition-shadow ease-in-out duration-300 shadow-none hover:shadow-xl"
                    src="{{ asset('images/Untitled_Artwork 4.png') }}"
                    alt=""
                    class="logo"
            /></a>
            <ul class="flex space-x-6 mr-6 text-lg">
                <li>
                    <a href="./#" class="hover:text-darkGrayishBlue"
            >About Us</a
          >
                </li>
                @auth
                <li>
                   <span class="font-bold uppercase">Welcome {{auth()->user()->name}}</span>
                </li>
                <li>
                    <form class="inline hover:text-darkGrayishBlue" method="POST" action="/logout">
                        @csrf
                        <button type="submit">
                            <i class="fa-solid fa-door-closed"></i>
                            Logout
                        </button>
                    </form>
                </li>
                <li>
                    <a href="/show_account" class="hover:text-darkGrayishBlue"
                        ><i class="fa-solid fa-user-plus"></i> Account</a
                    >
                </li>
                <li>
                    <a href="/qr_blade" class="hover:text-darkGrayishBlue"
                        ><i class="fa-solid fa-user-plus"></i> QR Code</a
                    >
                </li>
                <li>
                    <a href="/gallary" class="hover:text-darkGrayishBlue"
                        >
                        <i class="fa-sharp fa-solid fa-images"></i>Gallery</a
                    >
                </li>
                @else
                <li>
                    <a href="/register" class="hover:text-darkGrayishBlue"
                        ><i class="fa-solid fa-user-plus"></i> Register</a
                    >
                </li>
                <li>
                    <a href="/login" class="hover:text-darkGrayishBlue"
                        ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login</a
                    >
                </li>
                @endauth       
            </ul>
        </nav>
        <main>{{ $slot }}</main>
        @auth

        

        @else

        <footer
            class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-violet-600 text-white h-24 mt-24 opacity-90 md:justify-center"
        >
            <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>

          
        </footer>
        @endauth
        <x-flash-message/>
    </body>
</html>
