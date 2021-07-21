@extends('layouts.app')

@section('content')

    <style>
        .buttons {
            width: 350px;
        }

        .upload-btn {
            width: 200px;
        }

        .last-button {
            width: 660px;
        }

        .file-upload {
            display: none;
        }

        .p-image {
            border: 5px solid white;
            border-radius: 100%;
            background-color: white;
            font-size: 1.5rem;
            position: absolute;
            top: 140px;
            right: 20px;
            transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
        }

        .p-image:hover {
            transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
        }

        .second-form {
            max-width: 660px;
        }

        @media screen and (max-width: 660px) {
            .second-form {
                width: 460px;
            }

            .last-button {
                width: 460px;
            }
        }

        @media screen and (max-width: 480px) {
            .second-form {
                width: 360px;
            }

            .last-button {
                width: 360px;
            }
        }

        @media screen and (max-width: 360px) {
            .second-form {
                width: 260px;
            }

            .last-button {
                width: 260px;
            }
        }

    </style>
    <script>
        $(document).ready(function() {
            $(".upload-button").on('click', function() {
                $(".file-upload").click();
            });
        });

    </script>
    {{-- Image form --}}
    <div class="h-screen">
        <div class="m-auto max-w-lg">
            <div class="flex flex-row content-center justify-center my-6">
                <h1 class="text-4xl">Edit Profile</h1>
            </div>
            <div class="flex flex-col content-center justify-center">
                <div class="upload-button flex items-center justify-center">
                    <div class="relative w-40">
                        @if ($profile_image ?? '' != '')
                            <img class="my-3 rounded-full h-40 w-40 border-2 shadow-2xl"
                                src="{{ asset('/storage/profile_images/' . $profile_image) }}" alt="">
                        @else
                            <img class="my-3 rounded-full h-40 w-40 border-2 shadow-2xl"
                                src="{{ asset('/storage/profile_images/user.png') }}" alt="">
                        @endif
                        <i class="fa fa-camera p-image text-indigo-600"></i>
                    </div>
                </div>
                <div class="flex items-center justify-center">
                    <form action="{{ route('Profile.index') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-col justify-center items-center">

                            <input type="file" name="profile_image" class="file-upload">
                            <div class="flex flex-wrap -mx-2 overflow-hidden items-center justify-center">

                                <div
                                    class="flex flex-wrap -mx-2 overflow-hidden items-center justify-center my-1 px-2 w-full overflow-hidden sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2 ">
                                    <!-- Column Content -->
                                    <button name="image_form"
                                        class="mx-2 upload-btn my-1 group relative flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                        type="submit">
                                        Upload
                                    </button>
                                </div>

                                <div
                                    class="flex flex-wrap -mx-2 overflow-hidden items-center justify-center my-1 px-2 w-full overflow-hidden sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2">
                                    <!-- Column Content -->
                                    <button name="image_reset_form"
                                        class="mx-2 upload-btn buttons my-1 group relative flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                        type="submit">
                                        Reset
                                    </button>
                                </div>

                            </div>


                        </div>
                    </form>
                </div>
            </div>


            {{-- Second form --}}
            <div class="flex flex-row content-center justify-center">
                <form action="{{ route('Profile.index') }}" method="POST" class="second-form">
                    @csrf
                    <div>
                        <div class="flex flex-wrap -mx-2 overflow-hidden px-5">
                            <div class="my-2 px-2 w-full overflow-hidden sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2">
                                <input type="text" name="first_name" id="first_name"
                                    class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    placeholder="First Name" value="{{ $first_name ?? '' }}">
                                @error('first_name')
                                    <div class="text-center text-sm" style="padding-top: 3px;">
                                        <h2 class="font-medium text-red-500 hover:text-red-500">{{ $message }}</h2>
                                    </div>
                                @enderror
                            </div>
                            <div class="my-2 px-2 w-full overflow-hidden sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2">
                                <input type="text" name="last_name" id="last_name"
                                    class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    placeholder="Last Name" value="{{ $last_name ?? '' }}">
                                @error('last_name')
                                    <div class="text-center text-sm" style="padding-top: 3px;">
                                        <h2 class="font-medium text-red-500 hover:text-red-500">{{ $message }}</h2>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-wrap mb-3 px-5 -mx-2">
                            <div class="my-2 px-2 w-1/2 overflow-hidden sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2">
                                <input type="number" name="height" id="height"
                                    class="equipHeightValidation appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    placeholder="Height in cm" max="300" min="0" value="{{ $height ?? '' }}">
                                @error('height')
                                    <div class="text-center text-sm" style="padding-top: 3px;">
                                        <h2 class="font-medium text-red-500 hover:text-red-500">{{ $message }}</h2>
                                    </div>
                                @enderror
                            </div>
                            <div class="my-2 px-2 w-1/2 overflow-hidden sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2">
                                <input type="number" name="weight" id="weight"
                                    class="equipWeightValidation appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    placeholder="Weight in kg" max="500" min="0" value="{{ $weight ?? '' }}">
                                @error('weight')
                                    <div class="text-center text-sm" style="padding-top: 3px;">
                                        <h2 class="font-medium text-red-500 hover:text-red-500">{{ $message }}</h2>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-wrap mb-3 px-5">
                            <label for="DOB" class="w-1/2 text-gray-600 align-middle">Date of Birth: </label>
                            <input
                                class="w-1/2 text-gray-600 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm px-3 py-1 border border-gray-300 appearance-none rounded-none"
                                style="float: right;" id="DOB" type="date" name="DOB" value="{{ $DOB ?? '' }}"
                                autocomplete="DOB" autofocus>
                            @error('DOB')
                                <div class="text-center text-sm" style="padding-top: 3px;">
                                    <h2 class="font-medium text-red-500 hover:text-red-500">{{ $message }}</h2>
                                </div>
                            @enderror
                        </div>
                        <div class="flex flex-wrap mb-3 px-5">
                            <label for="level" class="w-1/2 text-gray-600 align-middle">Level: </label>
                            <select id="level" name="level"
                                class="w-1/2 text-gray-600 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm px-3 py-1 border border-gray-300 bg-white appearance-none rounded-none"
                                style="float: right;">
                                @if (($level ?? '') == 'Beginner')
                                    <option value="Beginner" selected>Beginner</option>
                                @else
                                    <option value="Beginner">Beginner</option>
                                @endif
                                @if (($level ?? '') == 'Intermediate')
                                    <option value="Intermediate" selected>Intermediate</option>
                                @else
                                    <option value="Intermediate">Intermediate</option>
                                @endif
                                @if (($level ?? '') == 'Advance')
                                    <option value="Advance" selected>Advance</option>
                                @else
                                    <option value="Advance">Advance</option>
                                @endif
                            </select>
                        </div>
                        <div class="my-2 px-5">
                            <label for="gender" class="col-md-4 col-form-label text-md-right text-gray-600"
                                style="padding: 0px 10px 0px 0px;">Gender : </label>
                            @if (($gender ?? '') == 'Male')
                                <input id="male" class="form-control" type="radio" name="gender" value="Male" checked>
                                <span class="text-gray-600" style="padding: 0px 10px 0px 0px;">Male</span>
                            @else
                                <input id="male" class="form-control" type="radio" name="gender" value="Male">
                                <span class="text-gray-600" style="padding: 0px 10px 0px 0px;">Male</span>
                            @endif
                            @if (($gender ?? '') == 'Female')
                                <input id="female" type="radio" class="form-control" name="gender" value="Female" checked>
                                <span class="text-gray-600" style="padding: 0px 10px 0px 0px;">Female</span>
                            @else
                                <input id="female" type="radio" class="form-control" name="gender" value="Female">
                                <span class="text-gray-600" style="padding: 0px 10px 0px 0px;">Female</span>
                            @endif
                            @error('gender')
                                <div class="text-center text-sm" style="padding-top: 3px;">
                                    <h2 class="font-medium text-red-500 hover:text-red-500">{{ $message }}</h2>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="last-button buttons block w-full flex items-center justify-center">
                        <button name="profile_form"
                            class="buttons my-2 group relative flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            type="submit">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
