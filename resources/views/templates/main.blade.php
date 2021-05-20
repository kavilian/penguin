<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'User Management System') }}</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- JS scripts -->
        <script src="{{ asset('js/app.js')}}" defer></script>
        
    </head>
    <body class="">

        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="#">{{ config('app.name', 'User Management System') }}</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.users.index') }}">Users</a>
                        </li>
        
                    </ul>
                    <div class="d-flex">
                        @if (Route::has('login'))
                            <div class="">
                                @auth
                                    <a href="{{ url('/home') }}" class="">Home</a>
                                    <a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                                    <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none">
                                        @csrf
                                    </form>
                                @else
                                    <a href="{{ route('login') }}" class="">Log in</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="">Register</a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        <main class="container">
            @include('partials.alerts')
            @yield('content')
        </main>
        
    </body>
</html>
