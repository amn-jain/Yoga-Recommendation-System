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
            <img class="mx-auto" src='/images/logo.jpeg' width="150" height="100">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Sign in to your account
            </h2>
        </div>

        @if (session('status'))
        <div class="text-center text-red-500">
            {{session('status')}}
        </div>
        @endif
        <form class="mt-8 space-y-6" action="{{ route('login') }}" method="post">
            @csrf
            <div class="rounded-md shadow-sm -space-y-px">
                <div style="padding-bottom: 10px;">
                    <label for="email" class="sr-only">Email address</label>
                    <input type="email" name="email" id="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm" placeholder="Email address" value="{{ old('email') }}">

                    @error('email')
                    <div>
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div style="padding-top: 10px;">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm" placeholder="Password">

                    @error('password')
                    <div>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>


            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="remember" class="ml-2 block text-sm text-gray-900">Remember me</label>
                </div>

                <div class="text-sm">
                    <a href="{{ route('password.request') }}" class="font-medium text-blue-600 hover:text-blue-500">
                        Forgot your password?
                    </a>
                </div>
            </div>


            <div>
                <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <svg class="h-5 w-5 text-blue-500 group-hover:text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                        </svg>
                    </span>
                    Sign in
                </button>
            </div>
        </form>

        <div class="text-center text-sm">
            <h2><a href="{{ route('register') }}" class="font-medium text-blue-600 hover:text-blue-500"> Register now </a></h2>
        </div>
    </div>
</div>
@endsection