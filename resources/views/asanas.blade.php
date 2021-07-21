@extends('layouts.app')

@section('content')

    <style>
        .color1 {
            background-color: #abc4ff;
        }

        .color2 {
            background-color: #c1d3fe;
        }

        .color3 {
            background-color: #d7e3fc;
        }

        .color4 {
            background-color: #89a2ff
        }

        .youtube {
            width: 700px;
            height: 450px;
        }

        @media screen and (max-width: 800px) {
            .youtube {
                width: 600px;
                height: 350px;
            }
        }

        @media screen and (max-width: 660px) {
            .youtube {
                width: 500px;
                height: 250px;
            }
        }

        @media screen and (max-width: 550px) {
            .youtube {
                width: 400px;
                height: 200px;
            }
        }

        @media screen and (max-width: 440px) {
            .youtube {
                width: 320px;
                height: 170px;
            }

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

        .card-color {
            background-color: #e2eafc;
            border-radius: 15px;
            /* box-shadow: 10px 10px 5px 10px #55555540; */
        }

        .input-contact {
            border-radius: 10px;
            border: 2px solid #cccccc;
        }

        .contact-button {
            color: #ffffff;
            width: 300px;
            height: 50px;
            border-radius: 10px;
        }

        .button-text {
            font-weight: 500;
        }

        .title {
            font-size: 30px;
        }

        /* CSS feedback */

        .range {
            position: relative;
            width: 370px;
            height: 5px;
        }

        .range input {
            width: 100%;
            position: absolute;
            top: 2px;
            height: 0;
            -webkit-appearance: none;
        }

        .range input::-webkit-slider-thumb {
            -webkit-appearance: none;
            width: 18px;
            height: 18px;
            margin: -8px 0 0;
            border-radius: 50%;
            background: #37adbf;
            cursor: pointer;
            border: 0 !important;
        }

        .range input::-moz-range-thumb {
            width: 18px;
            height: 18px;
            margin: -8px 0 0;
            border-radius: 50%;
            background: #37adbf;
            cursor: pointer;
            border: 0 !important;
        }

        .range input::-ms-thumb {
            width: 18px;
            height: 18px;
            margin: -8px 0 0;
            border-radius: 50%;
            background: #37adbf;
            cursor: pointer;
            border: 0 !important;
        }

        .range input::-webkit-slider-runnable-track {
            width: 100%;
            height: 2px;
            cursor: pointer;
            background: #b2b2b2;
        }

        .range input::-moz-range-track {
            width: 100%;
            height: 2px;
            cursor: pointer;
            background: #b2b2b2;
        }

        .range input::-ms-track {
            width: 100%;
            height: 2px;
            cursor: pointer;
            background: #b2b2b2;
        }

        .range input:focus {
            background: none;
            outline: none;
        }

        .range input::-ms-track {
            width: 100%;
            cursor: pointer;
            background: transparent;
            border-color: transparent;
            color: transparent;
        }

        .range-labels {
            margin: 18px -41px 0;
            padding: 0;
            list-style: none;
        }

        .range-labels li {
            position: relative;
            float: left;
            width: 90.25px;
            text-align: center;
            color: #b2b2b2;
            font-size: 14px;
            cursor: pointer;
        }

        .range-labels li::before {
            position: absolute;
            top: -25px;
            right: 0;
            left: 0;
            content: "";
            margin: 0 auto;
            width: 9px;
            height: 9px;
            background: #b2b2b2;
            border-radius: 50%;
        }

        .range-labels .active {
            color: #37adbf;
        }

        .range-labels .selected::before {
            background: #37adbf;
        }

        .range-labels .active.selected::before {
            display: none;
        }

    </style>


    <section class="text-gray-600 body-font color1">
        <div class="container mx-auto flex px-5 pt-16 pb-10 items-center justify-center flex-col">
            <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{ $asan->AName }}</h1>
            <br>

            <iframe class="youtube" src="https://www.youtube.com/embed/7R6kiCYW_xI" title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
            <br>
            <div class="text-center lg:w-2/3 w-full py-10">
                <p class="mb-8 leading-relaxed">{{ $asan->Description }}</p>
            </div>
        </div>
    </section>
    <section class="text-gray-600 body-font cards color2">

        @if ($asan->Benefits != null)
            <div class="flex justify-between m-6 card-color my-10 p-4">
                <div class="relative flex flex-col h-full max-w-md mx-auto rounded-lg">
                    <div class="py-2 px-4">
                        <h1 class="text-xl font-medium leading-6 tracking-wide text-gray-800">
                            Benefits
                        </h1>
                    </div>
                    <div class="px-4 space-y-2 py-2">
                        <p class="text-gray-700 font-normal leading-5 tracking-wide">
                            {{ $asan->Benefits, 0, 230 }}
                        </p>
                    </div>
                </div>
            </div>
        @endif

        @if ($asan->ContraIndications != null)
            <div class="flex justify-between m-6 card-color my-10 p-4">
                <div class="relative flex flex-col h-full max-w-md mx-auto rounded-lg">
                    <div class="py-2 px-4">
                        <h1 class="text-xl font-medium leading-6 tracking-wide text-gray-800">
                            ContraIndications
                        </h1>
                    </div>
                    <div class="px-4 space-y-2 py-2">
                        <p class="text-gray-700 font-normal leading-5 tracking-wide">
                            {{ $asan->ContraIndications, 0, 230 }}
                        </p>
                    </div>
                </div>
            </div>
        @endif

        @if ($asan->Breathing != null)
            <div class="flex justify-between m-6 card-color my-10 p-4">
                <div class="relative flex flex-col h-full max-w-md mx-auto rounded-lg">
                    <div class="py-2 px-4">
                        <h1 class="text-xl font-medium leading-6 tracking-wide text-gray-800">
                            Breathing
                        </h1>
                    </div>
                    <div class="px-4 space-y-2 py-2">
                        <p class="text-gray-700 font-normal leading-5 tracking-wide">
                            {{ $asan->Breathing, 0, 230 }}
                        </p>
                    </div>
                </div>
            </div>
        @endif

        @if ($asan->Awareness != null)
            <div class="flex justify-between m-6 card-color my-10 p-4">
                <div class="relative flex flex-col h-full max-w-md mx-auto rounded-lg">
                    <div class="py-2 px-4">
                        <h1 class="text-xl font-medium leading-6 tracking-wide text-gray-800">
                            Awareness
                        </h1>
                    </div>
                    <div class="px-4 space-y-2 py-2">
                        <p class="text-gray-700 font-normal leading-5 tracking-wide">
                            {{ $asan->Awareness, 0, 230 }}
                        </p>
                    </div>
                </div>
            </div>
        @endif

        @if ($asan->References != null)
            <div class="flex justify-between m-6 card-color my-10 p-4">
                <div class="relative flex flex-col h-full max-w-md mx-auto rounded-lg">
                    <div class="py-2 px-4">
                        <h1 class="text-xl font-medium leading-6 tracking-wide text-gray-800">
                            References
                        </h1>
                    </div>
                    <div class="px-4 space-y-2 py-2">
                        <p class="text-gray-700 font-normal leading-5 tracking-wide">
                            {{ $asan->References, 0, 230 }}
                        </p>
                    </div>
                </div>
            </div>
        @endif

    </section>

    <section class="flex flex-col items-center align-center color3 py-16 px-6">
        <div class="title pb-10">Feel free to drop us your feedback</div>
        <div class="pb-10">Please rate your experience and write to us to make our system better</div>
        <form class="flex flex-col items-center align-center">
            {{-- <label for="tickmarks"></label> --}}
            <div class="range">
                <input type="range" min="1" max="5" steps="1" value="1">
            </div>

            <ul class="range-labels">
                <li class="active selected">1</li>
                <li>2</li>
                <li>3</li>
                <li>4</li>
                <li>5</li>
            </ul>

            <div class="form-group position-relative message py-2">
                <textarea id="formMessage" class="input-contact form-control form-control-lg p-2" rows="7"
                    placeholder="Message"></textarea>
            </div>
            <div class="text-center ">
                <button type="submit" class="contact-button btn btn-primary color4" tabIndex="-1"><span
                        class="font-black">Send message</span></button>
            </div>
        </form>

    </section>
    <script>
        var sheet = document.createElement('style'),
            $rangeInput = $('.range input'),
            prefs = ['webkit-slider-runnable-track', 'moz-range-track', 'ms-track'];

        document.body.appendChild(sheet);

        var getTrackStyle = function(el) {
            var curVal = el.value,
                val = (curVal - 1) * 25,
                style = '';

            // Set active label
            $('.range-labels li').removeClass('active selected');

            var curLabel = $('.range-labels').find('li:nth-child(' + curVal + ')');

            curLabel.addClass('active selected');
            curLabel.prevAll().addClass('selected');

            // Change background gradient
            for (var i = 0; i < prefs.length; i++) {
                style += '.range {background: linear-gradient(to right, #37adbf 0%, #37adbf ' + val + '%, #fff ' + val +
                    '%, #fff 100%)}';
                style += '.range input::-' + prefs[i] + '{background: linear-gradient(to right, #37adbf 0%, #37adbf ' +
                    val + '%, #b2b2b2 ' + val + '%, #b2b2b2 100%)}';
            }

            return style;
        }

        $rangeInput.on('input', function() {
            sheet.textContent = getTrackStyle(this);
        });

        // Change input value on label click
        $('.range-labels li').on('click', function() {
            var index = $(this).index();

            $rangeInput.val(index + 1).trigger('input');

        });

    </script>
@endsection
