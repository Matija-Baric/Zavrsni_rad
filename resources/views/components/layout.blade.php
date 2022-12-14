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
            referrerpolicy="no-referrer"/>

            <script src="//unpkg.com/alpinejs" defer></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#ef3b2d",
                        },
                    },
                },
            };
        </script>
        <title>CarRentWebApp</title>
    </head>
    <body class="mb-48">
        <nav class="flex justify-between items-center mb-4">
            <a href="/"
                ><img class="w-24" src="{{asset('images/rent2.webp')}}" alt="" class="logo"
            /></a>
            <ul class="flex space-x-6 mr-6 text-lg">
                @auth
                <li>
                    <span class="font-bold uppercase">
                        Welcome {{auth()->user()->name}}
                    </span>
                </li>

                @php
           $id =auth()->id();
        if( $id == 2)
        { 
            @endphp
            <li>
                    <a href="/listings/manage " class="hover:text-laravel"
                        ><i class="fa-solid fa-gear"></i>
                        Manage Listings</a
                    >
                </li>
    @php
    } 
        @endphp

                <li>
                    <form class="inline" method="POST" action="/logout">
                        
                        @csrf
                        <button type="submit">
                            <i class="fa-solid fa-door-closed">Logout</i>
                        </button>
                    </form>
                </li>

                @else
                
                <li>
                    <a href="/register " class="hover:text-laravel"
                        ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                         Register</a
                    >
                </li>

                <li>
                    <a href="/login " class="hover:text-laravel"
                        ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                         Login</a
                    >
                </li>
                @endauth
            </ul>
        </nav>

        <main>
    {{$slot}}
        </main>

        @php
           $id =auth()->id();
        if( $id == 2)
        { 
            @endphp
        <footer class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold  text-white h-20 mt-20 opacity-90 md:justify-center"
        style="background-color:#545e68">
        
        <a
            href="/listings/create"
            class="absolute top-1/3 right-10 bg-black text-black py-2 px-5"
            style="background-color:#90b0bd"
            >
            Create New Car
        </a>
    </footer>
    @php
    } 
        @endphp





{{-- @php
           $id =auth()->id();
        if( $id == 2)
        { 
            @endphp
            <li>
                    <a href="/listings/manage " class="hover:text-laravel"
                        ><i class="fa-solid fa-gear"></i>
                        Manage Listing</a
                    >
                </li>
    @php
    } 
        @endphp --}}
        
    

    <x-flash-message />
</body>
</html>