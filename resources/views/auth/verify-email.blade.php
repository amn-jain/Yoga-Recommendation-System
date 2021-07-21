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

        /*.h-screen {
            height: calc(100vh - 60px);
        }*/

        .title{
            font-size: 30px;
        }
        p{
            font-size: 15px;
        }

    </style>
</head>
<body>
	<div class="h-screen w-screen flex flex-col items-center justify-center">
        <img class="mx-auto" src='/images/logo.jpeg' width="150" height="100">
    <h1 class="title mb-10">Verify email</h1>

    <p class="mb-10">Please verify your email address by clicking the link in the mail we just sent you. Thanks!</p>

    <form action="{{ route('verification.send') }}" method="POST">
        @csrf
        <button class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" type="submit">Request a new link</button>
    </form>
</div>
	</body>
	</html>


