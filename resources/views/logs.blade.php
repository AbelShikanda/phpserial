@extends('layouts.app')

@section('content')
    <div>
        <div class="profile-card-logs">
            <div class="img">
                <img src="https://play-lh.googleusercontent.com/0nEi836Ec0mgHa6X_NgY4cKtAz0tug-hndFg0SuHwEAE4S6GlBTcEu7ynKyCcPLSMAo=w240-h480-rw"
                    style="height:200px; width:200px" oncontextmenu="return false">
            </div>
            <div class="caption">
                <br>
                <h4>Access Logs</h4>
                <br>
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

                                <a id="navbarDropdown" class="greetings nav-link dropdown-toggle" href="#" role="button"
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
                <br>
                <br>
                <div class="social-links">
                    <div class="table-wrapper-scroll-y my-custom-scrollbar">

                        <table class="table table-bordered table-striped mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Action</th>
                                    <th scope="col">Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($logs as $log)
                                    <tr>
                                        <th scope="row">{{ $log->id }}</th>
                                        <td>{{ $log->user->name }}</td>
                                        <td>{{ $log->action }}</td>
                                        <td>{{ $log->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
@endsection
