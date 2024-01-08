<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fontawesome 6 cdn -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css' integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==' crossorigin='anonymous' referrerpolicy='no-referrer' />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">

        <header class="navbar navbar-dark sticky-top del_dark flex-md-nowrap px-2 py-3  ">
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/">Deliveboo</a>
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
           
            <div class="navbar-nav">
                <div class="nav-item text-nowrap ms-2 pe-3">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none ">
                        @csrf
                    </form>
                </div>
                <!-- <ul>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('dashboard') }}">{{__('Dashboard')}}</a>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">{{__('Profile')}}</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul> -->
            </div>
        </header>

        <div class="container-fluid vh-100">
            <div class="row h-100">
                <!-- Definire solo parte del menu di navigazione inizialmente per poi
								aggiungere i link necessari giorno per giorno
								 -->
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block del_dark navbar-dark sidebar collapse">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item ">

                                <a class="nav-link text-white {{ Route::currentRouteName() == 'dashboard' ? 'del_primary' : '' }}" href="{{route('dashboard')}}">
                                    <i class="fa-solid fa-tachometer-alt fa-lg fa-fw"></i> Dashboard
                                </a>

                                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.products.index' ? 'del_primary' : '' }}" href="{{route('admin.products.index')}}">
                                    <i class="fa-solid fa-book-open"></i> Piatti
                                </a>

                                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.orders.index' ? 'del_primary' : '' }}" href="{{route('admin.orders.index')}}">
                                <i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i> Ordini
                                </a>
                            </li>

                        </ul>


                    </div>
                </nav>

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 del_yellow">
                    @yield('content')
                </main>
            </div>
        </div>

    </div>
</body>

</html>