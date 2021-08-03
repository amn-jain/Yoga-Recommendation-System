@extends('layouts.app')

@section('content')

    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        html {
            background-color: #edf2fb;
        }

        body {
            letter-spacing: 0;
            text-rendering: optimizeLegibility;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            -moz-font-feature-settings: "liga"on;
        }

        img {
            height: auto;
            max-width: 100%;
            vertical-align: middle;
        }

        .btn {
            background-color: white;
            border: 1px solid #cccccc;
            color: #696969;
            padding: 0.5rem;
            bottom: 0px;
        }

        .btn--block {
            position: relative;
            display: block;
            width: 100%;
            margin-bottom: 10px;
            bottom: 0px;
        }

        .cards {
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
            flex-wrap: wrap;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .cards__item {
            display: flex;
            padding: 1rem;
        }

        @media (min-width: 40rem) {
            .cards__item {
                width: 50%;
            }
        }

        @media (min-width: 56rem) {
            .cards__item {
                width: 33.3333%;
            }
        }

        .card {
            background-color: white;
            border-radius: 0.25rem;
            box-shadow: 0 20px 40px -14px rgba(0, 0, 0, 0.25);
            display: flex;
            min-height: 550px;
            flex-direction: column;
            overflow: hidden;
        }

        .card:hover .card__image {
            filter: contrast(100%);
        }

        .card__content {
            display: flex;
            flex: 1 1 auto;
            flex-direction: column;
            padding: 1rem;
        }

        .card__image {
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
            border-top-left-radius: 0.25rem;
            border-top-right-radius: 0.25rem;
            filter: contrast(70%);
            overflow: hidden;
            position: relative;
            transition: filter 0.5s cubic-bezier(0.43, 0.41, 0.22, 0.91);
        }

        .card__image::before {
            content: "";
            display: block;
            padding-top: 56.25%;
        }

        @media (min-width: 40rem) {
            .card__image::before {
                padding-top: 66.6%;
            }
        }

        .card__image--flowers {
            background-image: url(https://unsplash.it/800/600?image=82);
        }

        .card__image--river {
            background-image: url(https://unsplash.it/800/600?image=11);
        }

        .card__image--record {
            background-image: url(https://unsplash.it/800/600?image=39);
        }

        .card__image--fence {
            background-image: url(https://unsplash.it/800/600?image=59);
        }

        .card__title {
            color: #e2eafc;
            font-size: 1.25rem;
            font-weight: 300;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .card__text {
            flex: 0 0 auto;
            font-size: 0.875rem;
            line-height: 1.5;
            margin-bottom: 1.25rem;
        }

        .med {
            margin-top: 1rem;
            width: 350px;
        }

        .title {
            width: 100%;
            font-size: 3rem;
            font-weight: 700;
            text-align: center;
        }

        .disp-hid {
            display: none;
        }

        .button-color {
            background-color: #9ab3ff;
        }

    </style>

    <script>
        $(document).ready(function() {

            var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
                removeItemButton: true,
                maxItemCount: 5,
                searchResultLimit: 5,
                renderChoiceLimit: 5
            });


        });

    </script>

    {{-- <div class="grid grid-cols-3">



    </div> --}}

    <div class="w-full overflow-hidden sm:w-full md:w-full lg:w-full xl:w-full">
        <div class="col-span-1">
            <div class="flex items-center justify-center">
                <form action="{{ route('dashboard') }}" method="POST" class="med">
                    @csrf
                    <select id="choices-multiple-remove-button" class="med" name=conditions[]
                        placeholder="Select upto 5 medical conditions" multiple value="HTML">
                        @foreach ($tags as $tag)
                            {{ $flag = true }}
                            @foreach ($conditions as $condition)
                                @if ($condition == $tag->DName)
                                    {{ $condition }}
                                    <option value="{{ $tag->DName }}" selected>{{ $tag->DName }}</option>
                                    {{ $flag = false }}
                                    break
                                @endif
                            @endforeach
                            @if ($flag)
                                <option value="{{ $tag->DName }}">{{ $tag->DName }}</option>
                            @endif
                        @endforeach
                    </select>
                    <button
                        class="med my-2 group relative w-full flex justify-center py-2 px-4 border border-transparent text-lg font-bold font-medium rounded-md text-white button-color hover:button-color focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-300"
                        type="submit">
                        Save
                    </button>
                </form>
            </div>
        </div>
    </div>



    {{-- Buttons --}}
    <style>
        .sort-filters {
            transition: ease-in 1s;
            /* margin: 20px 700px; */
            cursor: pointer;
            width: 220px;
        }

        .sort-filters .drop-label {
            transition: ease-in 1s;
            /* padding: 5px 5px; */
            margin: 0px 20px;
        }

        .sort-filters .drop-label.active {

            color: #46B5D9;
        }

        .sort-filters .drop-label:after {
            transition: ease-in 1s;
            content: '';
            /* margin-left: 25px; */
            /* background: url(http://static.huluim.com/huluguru/dropdown-s9ddd1171d7.png) no-repeat; */
            height: 10px;
            width: 10px;
            /* background-position: 0 -202px; */
            display: inline-block;
        }

        .sort-filters .dropdown {
            /* padding: 7px 5px; */
        }

        .sort-filters .dropdown.open {
            transition: ease-in 1s;
            background: rgba(255, 255, 255, 0.95);
            -webkit-box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        }

        .sort-filters .drop-wrapper {
            transition: ease-in 0.3s;
            height: 5px;
            overflow: hidden;
        }

        .sort-filters .drop-wrapper .drop-overview div.option.selected:before {
            content: '';
            /* background: url(http://static.huluim.com/huluguru/dropdown-s9ddd1171d7.png) no-repeat; */
            background-repeat: no-repeat;
            /* background-position: 0 -192px; */
            height: 8px;
            width: 20px;
            margin: 0px 5px 0px 5px;
            display: inline-block;
        }



        .sort-filters .drop-wrapper .drop-overview div.option:hover {
            background: #46B5D9;
            color: white;
            cursor: pointer;
            -webkit-border-radius: 2px;
        }

        .group {}

    </style>
    <div class="sort-filters m-2 border-2 bg-white">
        <div class="filter-wrapper">
            <div class="dropdown-wrapper">
                <div class="dropdown">
                    <div class="drop-label text-center text-xl">Filter</div>
                    <div class="drop-wrapper">
                        <div class="drop-viewport">
                            <div class="drop-overview">
                                <div class="option px-1" value="">Daily asanas</div>
                                <div class="option px-1" value="">Recommended</div>
                                <div class="option px-1" value="">All asanas</div>
                                <div class="option px-1" value="">Reset</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.dropdown').hover(function(e) {
                var $e = $(this);
                $e.find('.drop-label').addClass('active');
                $e.addClass('open');
                $e.find('.drop-wrapper').css('height', '90px');
            },
            function(e) {
                var $e = $(this);
                $e.find('.drop-label').removeClass('active');
                $e.removeClass('open');
                $e.find('.drop-wrapper').css('height', '0px');
            });

        $('.dropdown .drop-wrapper .option').click(function(e) {
            var $e = $(this);
            console.log($e.text());
            $e.closest('.dropdown').find('.drop-label').html($e.text());
            if ($e.text() === "Recommended") {
                var className = document.getElementById('all');
                className.classList.add('disp-hid');
                var className = document.getElementById('dai');
                className.classList.add('disp-hid');
                var className = document.getElementById('rec');
                className.classList.remove('disp-hid');
            } else if ($e.text() === "Daily asanas") {
                var className = document.getElementById('all');
                className.classList.add('disp-hid');
                var className = document.getElementById('rec');
                className.classList.add('disp-hid');
                var className = document.getElementById('dai');
                className.classList.remove('disp-hid');
            } else if ($e.text() === "All asanas") {
                var className = document.getElementById('rec');
                className.classList.add('disp-hid');
                var className = document.getElementById('dai');
                className.classList.add('disp-hid');
                var className = document.getElementById('all');
                className.classList.remove('disp-hid');
            } else {
                var className = document.getElementById('rec');
                className.classList.remove('disp-hid');
                var className = document.getElementById('all');
                className.classList.remove('disp-hid');
                var className = document.getElementById('dai');
                className.classList.remove('disp-hid');
            }
        });

    </script>

    {{-- Recommended asans --}}



    <div id="rec" class="cards">
        @if (sizeof($recommendations_data) != 0)
            <div class="title text-gray-500">Recommeded Asanas</div>
        @endif
        @foreach ($recommendations_data as $recommendation)
            <div class="flex justify-between m-6">
                <div class="relative flex flex-col h-full max-w-md mx-auto bg-gray-50 rounded-lg">
                    <img class="rounded-lg rounded-b-none"
                        src="http://www.3forty.media/ruki/wp-content/uploads/2020/06/meditation-yoga-1024x682.jpg"
                        alt="thumbnail" loading="lazy" />

                    <div class="py-2 px-4">
                        <h1
                            class="text-xl font-medium leading-6 tracking-wide text-gray-800 hover:text-blue-500 cursor-pointer">
                            <a
                                href="{{ route('asanas', ['AID' => $recommendation->AID]) }}">{{ $recommendation->AName }}</a>
                        </h1>
                    </div>
                    <div class="px-4 space-y-2">
                        <p class="text-gray-700 font-normal leading-5 tracking-wide">
                            {{ $benefits = substr($recommendation->Benefits, 0, 230) }}...
                        </p>
                        <a href="{{ route('asanas', ['AID' => $recommendation->AID]) }}" to="blog/detail"
                            class="font-bold hover:text-blue-400 text-blue-400">read more...
                        </a>
                    </div>
                    <div class="flex flex-row items-end h-full w-full px-4 mt-4 btn--block">
                        <a href="{{ route('asanas', ['AID' => $recommendation->AID]) }}"><button
                                class="btn btn--block card__btn">Open</button></a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>


    <div id="dai" class="cards">
        @if (sizeof($random_recommendations) != 0)
            <div class="title text-gray-500">Daily Asanas</div>
        @endif
        @foreach ($random_recommendations as $recommendation)
            <div class="flex justify-between m-6">
                <div class="relative flex flex-col h-full max-w-md mx-auto bg-gray-50 rounded-lg">
                    <img class="rounded-lg rounded-b-none"
                        src="http://www.3forty.media/ruki/wp-content/uploads/2020/06/meditation-yoga-1024x682.jpg"
                        alt="thumbnail" loading="lazy" />

                    <div class="py-2 px-4">
                        <h1
                            class="text-xl font-medium leading-6 tracking-wide text-gray-800 hover:text-blue-500 cursor-pointer">
                            <a
                                href="{{ route('asanas', ['AID' => $recommendation->AID]) }}">{{ $recommendation->AName }}</a>
                        </h1>
                    </div>
                    <div class="px-4 space-y-2">
                        <p class="text-gray-700 font-normal leading-5 tracking-wide">
                            {{ $benefits = substr($recommendation->Benefits, 0, 230) }}...
                        </p>
                        <a href="{{ route('asanas', ['AID' => $recommendation->AID]) }}" to="blog/detail"
                            class="font-bold hover:text-blue-400 text-blue-400">read more...
                        </a>
                    </div>
                    <div class="flex flex-row items-end h-full w-full px-4 mt-4 btn--block">
                        <a href="{{ route('asanas', ['AID' => $recommendation->AID]) }}"><button
                                class="btn btn--block card__btn">Open</button></a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>




    {{-- All asans --}}


    <div id="all" class="cards">
        <div class="title text-gray-500">All Asanas</div>
        @foreach ($asanas_data as $asana)
            <div class="flex justify-between m-6">
                <div class="relative flex flex-col h-full max-w-md mx-auto bg-gray-50 rounded-lg">
                    <img class="rounded-lg rounded-b-none"
                        src="http://www.3forty.media/ruki/wp-content/uploads/2020/06/meditation-yoga-1024x682.jpg"
                        alt="thumbnail" loading="lazy" />

                    <div class="py-2 px-4">
                        <h1
                            class="text-xl font-medium leading-6 tracking-wide text-gray-800 hover:text-blue-500 cursor-pointer">
                            <a href="{{ route('asanas', ['AID' => $asana->AID]) }}">{{ $asana->AName }}</a>
                        </h1>
                    </div>
                    <div class="px-4 space-y-2">
                        <p class="text-gray-700 font-normal leading-5 tracking-wide">
                            {{ $benefits = substr($asana->Benefits, 0, 230) }}...
                        </p>
                        <a href="{{ route('asanas', ['AID' => $asana->AID]) }}" to="blog/detail"
                            class="font-bold hover:text-blue-400 text-blue-400">read more...
                        </a>
                    </div>
                    <div class="flex flex-row items-end h-full w-full px-4 mt-4 btn--block">
                        <a href="{{ route('asanas', ['AID' => $asana->AID]) }}"><button
                                class="btn btn--block card__btn">Open</button></a>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="flex flex-col">
            {!! $asanas_data->links() !!}
        </div>
    </div>


    <script>
        document.getElementById('q').onclick = function() {

            var className = document.getElementById('all');
            className.classList.add('disp-hid');
            var className = document.getElementById('rec');
            className.classList.remove('disp-hid');
        }

        document.getElementById('w').onclick = function() {

            var className = document.getElementById('rec');
            className.classList.add('disp-hid');
            var className = document.getElementById('all');
            className.classList.remove('disp-hid');
        }

    </script>
@endsection
