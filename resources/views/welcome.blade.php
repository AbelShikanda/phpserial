<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SmartLock</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- bootstrap -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Styles -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap');

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(to right, #000000, #000000fb, #000000fb);
            font-family: 'Quicksand', sans-serif;
        }

        .profile-card {
            width: 200px;
            height: 200px;
            background: #dadada;
            padding: 3px 30px 30px 3px;
            border-radius: 50%;
            box-shadow: 0 0 22px #3336;
            transition: .6s;
        }

        .profile-card:hover {
            display: flex;
            flex-direction: column;
            border-radius: 10px;
            height: 400px;
        }

        .profile-card img {
            width: 100%;
            height: 100%;
            transition: .6s;
            z-index: 10;
        }

        .profile-card:hover img {
            transform: translateY(-60px);
        }

        img {
            width: 100%;
            border-radius: 50%;
            box-shadow: 0 0 22px #3336;
            transition: .6s;
            margin-left: -2%;
        }

        .profile-card:hover img {
            border-radius: 10px;
        }

        .caption {
            text-align: center;
            margin-left: 10%;
            transform: translateY(-70px);
            opacity: 0;
            transition: .6s;
        }

        .profile-card:hover .caption {
            opacity: 1;
        }

        .caption h3 {
            font-size: 30px;
            font-weight: 500;
            color: #000;
        }

        .caption .bott a {
            color: white;
        }

        .caption p {
            position: relative;
            display: flex;
            width: 100%;
            justify-content: center;
            top: -25px;
            font-size: 15px;
            color: #000;

        }

        .social-links {
            display: flex;
            flex-wrap: wrap;
            width: 100%;
            justify-content: space-around;
            position: relative;
            top: -35px;
            right: -3%;
        }

        @media only screen and (max-width: 700px) {
            .profile-card {
                margin-top: 45px;
            }

        }
    </style>
    <style>
        *,

        a {
            color: inherit;
            text-decoration: inherit
        }

        .flex {
            display: flex
        }

        .right-0 {
            right: 0
        }

        .shadow {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06)
        }

        .text-center {
            text-align: center
        }

        .text-gray-200 {
            --text-opacity: 1;
            color: #edf2f7;
            color: rgba(237, 242, 247, var(--text-opacity))
        }

        .text-gray-300 {
            --text-opacity: 1;
            color: #e2e8f0;
            color: rgba(226, 232, 240, var(--text-opacity))
        }

        .text-gray-400 {
            --text-opacity: 1;
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--text-opacity))
        }

        .text-gray-500 {
            --text-opacity: 1;
            color: #a0aec0;
            color: rgba(160, 174, 192, var(--text-opacity))
        }

        .text-gray-600 {
            --text-opacity: 1;
            color: #718096;
            color: rgba(113, 128, 150, var(--text-opacity))
        }

        .text-gray-700 {
            --text-opacity: 1;
            color: #4a5568;
            color: rgba(74, 85, 104, var(--text-opacity))
        }

        .text-gray-900 {
            --text-opacity: 1;
            color: #1a202c;
            color: rgba(26, 32, 44, var(--text-opacity))
        }

        @media (min-width:640px) {
            .sm\:rounded-lg {
                border-radius: .5rem
            }

            .sm\:block {
                display: block
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-start {
                justify-content: flex-start
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:h-20 {
                height: 5rem
            }

            .sm\:ml-0 {
                margin-left: 0
            }

            .sm\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .sm\:pt-0 {
                padding-top: 0
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media (min-width:768px) {
            .md\:border-t-0 {
                border-top-width: 0
            }

            .md\:border-l {
                border-left-width: 1px
            }

            .md\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width:1024px) {
            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem
            }
        }

        @media (prefers-color-scheme:dark) {
            .dark\:bg-gray-800 {
                --bg-opacity: 1;
                background-color: #2d3748;
                background-color: rgba(45, 55, 72, var(--bg-opacity))
            }

            .dark\:bg-gray-900 {
                --bg-opacity: 1;
                background-color: #1a202c;
                background-color: rgba(26, 32, 44, var(--bg-opacity))
            }

            .dark\:border-gray-700 {
                --border-opacity: 1;
                border-color: #4a5568;
                border-color: rgba(74, 85, 104, var(--border-opacity))
            }

            .dark\:text-white {
                --text-opacity: 1;
                color: #fff;
                color: rgba(255, 255, 255, var(--text-opacity))
            }

            .dark\:text-gray-400 {
                --text-opacity: 1;
                color: #cbd5e0;
                color: rgba(203, 213, 224, var(--text-opacity))
            }
        }
    </style>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>

<body class="antialiased">
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

    </div>

    <div>
        <div class="profile-card">
            <div class="img">
                <img src="https://play-lh.googleusercontent.com/0nEi836Ec0mgHa6X_NgY4cKtAz0tug-hndFg0SuHwEAE4S6GlBTcEu7ynKyCcPLSMAo=w240-h480-rw" style="height:200px; width:200px"
                    oncontextmenu="return false">
            </div>
            <div class="caption">
                <br>
                <h4>Smart Lock</h4>
                <hr>
                <p>Reliable Security System</p>
                <br>
                <div class="social-links">
                    @if (Route::has('login'))
                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                            @auth
                            <a href="{{ url('/home') }}" class="btn btn-rounded btn-primary text-sm text-light-700 underline">Home</a>
                            @else
                            <a href="{{ route('login') }}" class="btn btn-rounded btn-success text-sm text-light-700 underline">Log in</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" target="">
                                        <a href="{{ route('register') }}" class="btn btn-rounded btn-secondary ml-4 text-sm text-light-700 underline">Register</a>
                                    </a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>

                <hr>
            </div>
        </div>
    </div>
</body>

<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<!--=============== MAIN JS ===============-->
<script src="{{ asset('js/main.js') }}"></script>

</html>
