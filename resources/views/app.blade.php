<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/navbars-offcanvas/">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>
</head>

<body>


    <nav class="navbar navbar-dark " style="background-color:#A9A9A9;" aria-label="Dark offcanvas navbar">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#menu" aria-controls="offcanvasNavbarDark">
                <i class="bi bi-list"></i>
            </button>
            <div class="offcanvas offcanvas-start text-white" style="background-color: 	#636257;" tabindex="-1" id="menu" aria-labelledby="offcanvasNavbarDarkLabel">
                <div class="offcanvas-header">
                    <i class="bi bi-list"></i>
                    <h5 class="offcanvas-title" id="offcanvasNavbarDarkLabel">MENU</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <hr>
                <div class="offcanvas-body">
                    <a type="button" class="btn text-white btn-lg btn-block w-100" href="{{ route('equipamentos.index') }}">EQUIPAMENTOS</a>
                    <a type="button" class="btn text-white btn-lg btn-block w-100" href="{{ route('manutencoes.index') }}">MANUTENÇÕES</a>
                    @if(Auth::check())

                    <a type="button" class="btn text-white btn-lg btn-block w-100" href="/rel_equip">MANUTENÇÕES POR EQUIPAMENTOS</a>
                    <a type="button" class="btn text-white btn-lg btn-block w-100" href="/users/index">USUÁRIOS</a>
                    @endif
                </div>
            </div>

            @if(Auth::check())
            <a style="font-size:1.4rem;" class="navbar-brand" href="/auth">GERENCIADOR DE EQUIPAMENTOS</a>
            @else
            <a style="font-size:1.4rem;" class="navbar-brand" href="/">GERENCIADOR DE EQUIPAMENTOS</a>
            @endif

            @if(Auth::check())
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="flex items-center text-sm font-medium text-white hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                        <div>{{ Auth::user()->name }}</div>
                        <div class="ml-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
            @else
                <!-- Login -->
                <a href="{{ route('login') }}" class="btn btn-secundary text-white me-2">Login</a>
            @endif
        </div>
    </nav>


    <!-- CONTEUDO A SER MODIFICADO -->
    <div id='content '>
        @yield('content')
    </div>


    <!-- CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- JS -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <footer class="container">
        <hr class="my-2">
        <!-- <div class="py-4">
            <a class="btn text-white btn-lg btn-block w-70 float-end" href="#" style="background-color: #63625F ; border-color:#63625F">Back to top</a>
        </div> -->
    </footer>

</body>

</html>
