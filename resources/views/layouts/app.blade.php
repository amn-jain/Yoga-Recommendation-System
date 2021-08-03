<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YRS</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Poppins', sans-serif;
            animation: 1s fadeIn;
        }

        .ele {
            animation: 1s fadeIn;
            animation-fill-mode: forwards;

            visibility: hidden;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                visibility: visible;
                opacity: 1;
            }
        }

        .h-screen {
            height: calc(100vh - 60px);
        }

    </style>
</head>

<body x-data="{ open: false }">
    <script src="https://kit.fontawesome.com/ea9411e9d7.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <div :class="{'bg-blue-100': open, 'bg-white': !open}"
        class="w-full text-xlay-700 bg-white dark-mode:text-xlay-200 dark-mode:bg-gray-800">
        <div class="flex flex-col max-w-screen-none px-0 m-0 md:items-center md:justify-between md:flex-row md:px-0 lg:px-0"
            style="margin: 0px 0px 0px 0px;">
            <div class="p-6 flex flex-row items-center justify-between bg-blue-100">
                <a :class="{'opacity-0': open, 'unset': !open}" href="{{ route('home') }}"
                    class="text-xl tracking-widest text-xlay-900 uppercase rounded-lg dark-mode:text-xlite focus:outline-none focus:shadow-outline">YRS</a>
                <button class="z-10 md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                        <path x-show="!open" fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                        <path x-show="open" fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <nav :class="{'flex absolute bg-blue-100 w-screen h-screen': open, 'hidden': !open}"
                class="ele flex-col flex-grow-0 pb-4 md:pb-0 hidden md:flex md:justify-center md:flex-row z-10"
                style="top: 60px; right: 0px;">
                <a class="leading-none flex justify-center px-4 py-2 mt-2 text-xl"
                    style="line-height: 0px; padding: 2rem;" href="{{ route('home') }}">Home</a>

                @auth<a class="leading-none flex justify-center px-4 py-2 mt-2 text-xl"
                    style="line-height: 0px; padding: 2rem;" href="{{ route('dashboard') }}">Dashboard</a>@endauth
                {{-- <a class="leading-none flex justify-center px-4 py-2 mt-2 text-xl"
                    style="line-height: 0px; padding: 2rem;" href="{{ route('team') }}">Team</a> --}}

                <a class="leading-none flex justify-center px-4 py-2 mt-2 text-xl"
                    style="line-height: 0px; padding: 2rem;" href="/#contactUs">Contact us</a>

                @guest<a class=" flex justify-center px-4 py-2 mt-2 text-xl" style="line-height: 0px; padding: 2rem;"
                        href="{{ route('login') }}"><i class="far fa-user-circle"
                            style="line-height: 0px; padding-right: 5px"></i>
                    Login</a>@endguest

                @auth <div @click.away="open = false" class="relative" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex justify-center flex flex-row items-center w-full px-4 py-2 mt-2 focus:outline-none focus:shadow-outline">
                            <span style="line-height: 0px; font-size:1.5rem; padding: 0.8rem;"><i
                                    class="fas fa-user-circle"></i></span>

                            {{-- <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}"
                                class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg> --}}
                        </button>

                        <div x-show="open" x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="ele absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                            <div class="px-2 py-2 bg-blue-50 rounded-md shadow dark-mode:bg-gray-800">
                                <a class="flex justify-center block px-4 py-2 mt-2 text-xl"
                                    href="{{ route('Profile.index') }}" style="padding: 1rem;">Account</a>
                                <form class="flex justify-center block px-4 py-2 mt-2 text-xl" style="padding: 1rem;"
                                    action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit">Logout</button>
                                </form>
                            </div>
                        </div>
                </div> @endauth
            </nav>
        </div>
    </div>
    @yield('content')
</body>

</html>
