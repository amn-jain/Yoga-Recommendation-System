@extends('layouts.app')
@section('content')

<style>
    .min-h-screen {
        min-height: calc(100vh - 75px);
    }
</style>


<div class="min-h-screen flex items-center justify-center bg-white py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div>
            <img class="mx-auto" src='/images/logo.jpeg' width="150" 
     height="100">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Sign Up to your account
            </h2>
        </div>

        <form class="mt-8 space-y-6" action="{{ route('register') }}" method="post">
            @csrf
            <div class="rounded-md shadow-sm -space-y-px">
                <!-- <div class="flex flex-wrap">
                    <div class="w-1/2">
                        <label for="first_name" class="sr-only">First name</label>
                        <input type="text" name="first_name" id="first_name" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm" placeholder="First Name" value="{{ old('first_name') }}">

                        @error('first_name')
                        <div class="text-center text-sm" style="padding-top: 3px;">
                            <h2 class="font-medium text-red-500 hover:text-red-500">{{ $message }}</h2>
                        </div>
                        @enderror
                    </div>

                    <div class="w-1/2">
                        <label for="last_name" class="sr-only">Last name</label>
                        <input type="text" name="last_name" id="last_name" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm" placeholder="Last Name" value="{{ old('last_name') }}">

                        @error('last_name')
                        <div class="text-center text-sm" style="padding-top: 3px;">
                            <h2 class="font-medium text-red-500 hover:text-red-500">{{ $message }}</h2>
                        </div>
                        @enderror
                    </div>
                </div> -->

                <div style="padding-top: 10px;">
                    <label for="username" class="sr-only">User Name</label>
                    <input type="username" name="username" id="username" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm" placeholder="Username" value="{{ old('username') }}">

                    @error('username')
                    <div class="text-center text-sm" style="padding-top: 3px;">
                        <h2 class="font-medium text-red-500 hover:text-red-500">{{ $message }}</h2>
                    </div>
                    @enderror
                </div>

                <div style="padding-top: 10px;">
                    <label for="email" class="sr-only">Email address</label>
                    <input type="email" name="email" id="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm" placeholder="Email address" value="{{ old('email') }}">

                    @error('email')
                    <div class="text-center text-sm" style="padding-top: 3px;">
                        <h2 class="font-medium text-red-500 hover:text-red-500">{{ $message }}</h2>
                    </div>
                    @enderror
                </div>

                <div style="padding-top: 10px;">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm" placeholder="Password">

                    @error('password')
                    <div class="text-center text-sm" style="padding-top: 3px;">
                        <h2 class="font-medium text-red-500 hover:text-red-500">{{ $message }}</h2>
                    </div>
                    @enderror
                </div>

                <div style="padding-top: 10px;">
                    <label for="password_confirmation" class="sr-only">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm" placeholder="Confirm Password">
                </div>
            </div>
            <div>
                <button type=" submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <svg class="h-5 w-5 text-blue-500 group-hover:text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                        </svg>
                    </span>
                    Sign Up
                </button>
            </div>

        </form>

        <div class="text-center text-sm">
            <h2>Already have an account? <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-500">Log In</a></h2>
        </div>
    </div>
</div>

@endsection