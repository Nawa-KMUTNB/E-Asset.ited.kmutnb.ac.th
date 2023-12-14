<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('', 'E-Asset Management') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link href="../css/main.css" rel="stylesheet">
    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

    <link rel="stylesheet" href="../build/assets/app.css">
    <script src="../build/assets/app.js"></script>

</head>

<body>
    <div class="container-fluid" style="background-color:#7F00FF;">
        <p class="text-center" style=" margin-top:15px;color:white;margin:auto;">
            <img src="/ited.jpg" alt="ited" style="margin-left:20px; width:40px; height:40px;" class="img-fluid">

            เว็บไซต์บริหารจัดการครุภัณฑ์ของสำนักพัฒนาเทคนิคศึกษา <br>(E-Asset Management)
        </p>
    </div>




    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light  shadow-sm" style="background-color:#ccc;">
            <div class="container-fluid">


                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}" id="font-color">{{ __('ล็อคอิน') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"
                                        id="font-color">{{ __('สมัครสมาชิก') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown mt-2 mb-2 d-grid gap-2 d-md-flex justify-content-md-end">
                                <a class="nav-link dropdown-toggle btn btn-light" style="color: black" href="#"
                                    id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>


                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" style="color:red;" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                @endguest
            </div>
        </nav>
    </div>


    <main class="py-4">
        @yield('content')
    </main>
</body>

</html>
