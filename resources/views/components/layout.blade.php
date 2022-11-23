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
    <body>
    <nav class="relative container mx-auto p-6 bg-violet-600 text-white opacity-90 w-auto">
      <!-- Flex container -->
      <div class="flex items-center justify-between">
        <!-- Logo -->
        <div class="pt-2">
            <a href="/">
                <img class="w-28" src="{{ asset('images/Untitled_Artwork 4.png') }}" alt="logo" />
            </a>
        </div>
        <!-- Menu Items -->
        <div class="hidden space-x-6 md:flex">
        @auth
        <form class="inline hover:text-brightRed" method="POST" action="/logout">
        @csrf
            <button type="submit"> <i class="fa-solid fa-door-closed"></i>
            Logout
            </button>
        </form>
       
          <a href="/show_account" class="hover:text-brightRed"><i class="fa-solid fa-user-plus"></i> Account</a>

          <a href="/qr_blade" class="hover:text-brightRed"><i class="fa-solid fa-user-plus"></i> QR Code</a>

          <a href="/gallary" class="hover:text-brightRed"><i class="fa-sharp fa-solid fa-images"></i>Gallery</a>

          @else

          <a href="/register" class="hover:text-brightRed"><i class="fa-solid fa-user-plus"></i> Register</a>
          
          <a href="/login" class="hover:text-brightRed"><i class="fa-solid fa-arrow-right-to-bracket"></i>Login</a>
        @endauth
        </div>

        <!-- Hamburger Icon -->
        <button
          id="menu-btn"
          class="block hamburger md:hidden focus:outline-none"
        >
          <span class="hamburger-top"></span>
          <span class="hamburger-middle"></span>
          <span class="hamburger-bottom"></span>
        </button>
      </div>

      <!-- Mobile Menu -->
      <div class="md:hidden">
        <div
          id="menu"
          class="absolute flex-col items-center hidden self-end py-8 mt-10 space-y-6 font-bold bg-violet-600 opacity-100 sm:w-auto sm:self-center left-6 right-6 drop-shadow-md"
        >
          @auth
        <form class="inline hover:class=hover:text-brightRed" method="POST" action="/logout">
        @csrf
            <button type="submit"> <i class="fa-solid fa-door-closed"></i>
            Logout
            </button>
        </form>
       
          <a href="/show_account" class="hover:class=hover:text-brightRed"><i class="fa-solid fa-user-plus"></i> Account</a>

          <a href="/qr_blade" class="hover:class=hover:text-brightRed"><i class="fa-solid fa-user-plus"></i> QR Code</a>

          <a href="/gallary" class="hover:class=hover:text-brightRed"><i class="fa-sharp fa-solid fa-images"></i>Gallery</a>

          @else

          <a href="/register" class="hover:class=hover:text-brightRed"><i class="fa-solid fa-user-plus"></i> Register</a>
          
          <a href="/login" class="hover:class=hover:text-brightRed"><i class="fa-solid fa-arrow-right-to-bracket"></i>Login</a>
        @endauth
        </div>
      </div>

        <script>
            const btn = document.getElementById("menu-btn");
            const nav = document.getElementById("menu");

            btn.addEventListener("click", () => {
            btn.classList.toggle("open");
            nav.classList.toggle("flex");
            nav.classList.toggle("hidden");
            });
        </script>
    </nav>

        <main>{{ $slot }}</main>
        @auth
        @else

    <!-- Footer -->
    <footer class=" bottom-0 bg-veryDarkBlue">
      <!-- Flex Container -->
      <div
        class="container flex flex-col-reverse justify-between px-6 py-10 mx-auto space-y-8 md:flex-row md:space-y-0"
      >
        <!-- Logo and social links container -->
        <div
          class="flex flex-col-reverse items-center justify-between space-y-12 md:flex-col md:space-y-0 md:items-start"
        >
          <div class="mx-auto my-6 text-center text-white md:hidden">
            Copyright &copy; 2022, All Rights Reserved
          </div>
          <!-- Logo -->
          <div>
            <img class="w-28" src="{{ asset('images/Untitled_Artwork 4.png') }}" alt="" />
          </div>
          <!-- Social Links Container -->
          <div class="flex justify-center space-x-4">
            <!-- Link 1 -->
            <a href="#">
              <img src="img/icon-facebook.svg" alt="" class="h-8" />
            </a>
            <!-- Link 2 -->
            <a href="#">
              <img src="img/icon-youtube.svg" alt="" class="h-8" />
            </a>
            <!-- Link 3 -->
            <a href="#">
              <img src="img/icon-twitter.svg" alt="" class="h-8" />
            </a>
            <!-- Link 4 -->
            <a href="#">
              <img src="img/icon-pinterest.svg" alt="" class="h-8" />
            </a>
            <!-- Link 5 -->
            <a href="#">
              <img src="img/icon-instagram.svg" alt="" class="h-8" />
            </a>
          </div>
        </div>
        <!-- List Container -->
        <div class="flex justify-around space-x-32">
          <div class="flex flex-col space-y-3 text-white">
            <a href="#" class="hover:text-brightRed">Home</a>
            <a href="#" class="hover:text-brightRed">Pricing</a>
            <a href="#" class="hover:text-brightRed">Products</a>
            <a href="#" class="hover:text-brightRed">About</a>
          </div>
          <div class="flex flex-col space-y-3 text-white">
            <a href="#" class="hover:text-brightRed">Careers</a>
            <a href="#" class="hover:text-brightRed">Community</a>
            <a href="#" class="hover:text-brightRed">Privacy Policy</a>
          </div>
        </div>

        <!-- Input Container -->
        <div class="flex justify-between items-center">
          <div class="hidden text-white md:block">
            Copyright &copy; 2022, All Rights Reserved
          </div>
        </div>
      </div>
    </footer>
        @endauth
        <x-flash-message/>
    </body>
</html>