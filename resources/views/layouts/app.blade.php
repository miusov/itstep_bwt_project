<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
            ]); ?>
        </script>
        <script src="{{asset('js/tablesorter/jquery-latest.js')}}"></script>
        <script src="{{asset('js/tablesorter/jquery.tablesorter.js')}}"></script>
    </head>
    <body>
    <div class="text-right" style="margin-right: 15px">
        {{ trans('index.lang') }}: <a href="{{ url('/setlocale/en') }}">en</a> | <a href="{{ url('/setlocale/ru') }}">ru</a> | <a href="{{ url('/setlocale/ua') }}">ua</a>
    </div>
        <div id="app">
            <nav class="navbar navbar-default navbar-static-top">
                <div class="container">
                    <div class="navbar-header">

                        <!-- Collapsed Hamburger -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <!-- Branding Image -->
                        <a class="navbar-brand" href="{{ url('/') }}" style="color: darkblue">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    </div>

                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav">
                            <li><a href="{{ url('/lists') }}">{{ trans('index.li1') }}</a></li>
                            <li><a href="{{ url('/subscribers') }}">{{ trans('index.li2') }}</a></li>
                            <li><a href="{{ url('/subscribers/create') }}">{{ trans('index.li3') }}</a></li>
                            <li><a href="{{ url('/send-email') }}">{{ trans('index.li4') }}</a></li>
                            <li><a href="{{ url('/settings') }}">{{ trans('index.li5') }}</a></li>
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">{{ trans('index.login') }}</a></li>
                            <li><a href="{{ url('/register') }}">{{ trans('index.register') }}</a></li>
                            @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('/home') }}">{{ trans('index.home') }}</a></li>
                                    <li><a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ trans('index.logout') }}</a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>

            @yield('content')
        </div>
        <script>
            $(document).ready(function(){
                $("#myTable").tablesorter();
            });
        </script>
    </body>
    </html>
