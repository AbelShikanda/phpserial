@extends('layouts.app')

@section('content')

    <div>
        <div class="profile-card">
            <div class="img">
                <img src="https://play-lh.googleusercontent.com/0nEi836Ec0mgHa6X_NgY4cKtAz0tug-hndFg0SuHwEAE4S6GlBTcEu7ynKyCcPLSMAo=w240-h480-rw"
                    style="height:200px; width:200px" oncontextmenu="return false">
            </div>
            <div class="caption">
                <br>
                <h4>Smart Lock</h4>
                <nav class="navbar navbar-expand-md navbar-light bg-transparent shadow-sm" style="padding: 0;">
                    <div class="container">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        @guest
                        @else
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Greetings {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ route('home') }}">
                                        {{ __('Home') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logs') }}">
                                        {{ __('Logs') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                </div>
                            </div>
                        @endguest
                    </div>
                </nav>
                <br>
                @if (count($errors) > 0)
                    <div class="alert alert-danger col-md-12">
                        <strong>Whoops!</strong>
                        @foreach ($errors->all() as $error)
                            <h6>{{ $error }}</h6>
                        @endforeach
                    </div>
                @endif
                <div class="p-0">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                </div>
                <div class="social-links">
                    @if (Route::has('login'))
                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                            @auth
                                @if (Auth::user()->is_appr)
                                    <form method="POST" action="{{ route('store') }}">
                                        @csrf
                                        @php
                                            $user = Auth::user();
                                            $countdown = $countdown ? $countdown->countdown : null;
                                        @endphp
                                        <input name="set_id" type="text" value="{{ $user->id }}" hidden>
                                        <input id="datecount" type="text" value="{{ $countdown }}" hidden>
                                        <input name="signal_id" type="submit"
                                            class="btn btn-rounded btn-success text-sm text-light-700 underline mx-"
                                            value="Lock">
                                        <input name="signal_id" type="submit"
                                            class="btn btn-rounded btn-danger text-sm text-light-700 underline mx-"
                                            value="Unlock">
                                    </form>
                                @else
                                    <input name="signal_id" type="submit"
                                        class="btn btn-rounded btn-secondary text-sm text-light-700 underline mx-" value="Lock" disabled>
                                    <input name="signal_id" type="submit"
                                        class="btn btn-rounded btn-secondary text-sm text-light-700 underline mx-" value="Unlock" disabled>
                                @endif
                            @else
                                <a href="{{ route('login') }}"
                                    class="btn btn-rounded btn-success text-sm text-light-700 underline">Log in</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" target="">
                                        <a href="{{ route('register') }}"
                                            class="btn btn-rounded btn-secondary ml-4 text-sm text-light-700 underline">Register</a>
                                    </a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
                <p id="demo"></p>
                <hr>
            </div>
        </div>
    </div>

@endsection
