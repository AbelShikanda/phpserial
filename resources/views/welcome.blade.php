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
