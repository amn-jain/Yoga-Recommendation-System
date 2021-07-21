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
        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                visibility: visible;
                opacity: 1;
            }
        }
    </style>
</head>
<body>



<div class="min-h-screen flex items-center justify-center bg-white py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div>
            <img class="mx-auto" src='/images/logo.jpeg' width="150" height="100">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Reset your password
            </h2>
        </div>

        @if (session('status'))
        <div class="text-center text-red-500">
            {{session('status')}}
        </div>
        @endif
        <form class="mt-8 space-y-6" action="{{ route('password.email') }}" method="post">
            @csrf
            <div class="rounded-md shadow-sm -space-y-px">
                <div style="padding-bottom: 10px;">
                    <label for="email_address" class="sr-only">Email address</label>
                    <input type="email" name="email" id="email_address" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm" placeholder="Email address" value="{{ old('email') }}">

                    @error('email')
                    <div>
                        {{ $message }}
                    </div>
                    @enderror
                </div>

            </div>


            <div>
                <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <svg class="h-5 w-5 text-blue-500 group-hover:text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                        </svg>
                    </span>
                    Send Password Reset Link
                </button>
            </div>
        </form>

    </div>
</div>





<!-- <div class="h-screen w-screen flex flex-col items-center align center bg-red-50">

<form action="{{ route('password.email') }}" method="POST">
    @csrf
    <label for="email_address">E-Mail Address</label>
    <input type="text" id="email_address" class="form-control" name="email" required autofocus>
    @if ($errors->has('email'))
    <span>{{ $errors->first('email') }}</span>
    @endif

    <button type="submit">
        Send Password Reset Link
    </button>
</form></div> -->

</body>

</html>