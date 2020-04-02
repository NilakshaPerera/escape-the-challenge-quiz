<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script>window.laravel = {csrfToken: '{{ csrf_token() }}'}</script>
        <script> var base = '{{url(' / ') . ' / '}}';</script>
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="shortcut icon" type="image/png" href="{{ url('/') . '/images/favicon.ico' }}"/>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/vuejs-dialog.min.css') }}" rel="stylesheet">
        <script>
            var flag = '{{ (Auth::user())? true : false }}';
            var base = '{{url('/') . '/'}}';
        </script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src = "http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src = "http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
      
    </head>
    <body class="default">
        <nav id="" name="" class="navbar navbar-expand-lg navbar-light header-nav">
            <div class="container">
                <span id="clock-el"></span>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul id="main-menu" name="main-menu" class="navbar-nav mr-auto center-div">
                    </ul>
                    <span class="navbar-text">
                        <ul id="control-menu" name="control-menu" class="navbar-nav ml-auto">                                            
                            @guest
                            <li class="nav-item">
                                <!--<a class="nav-link" href="{ route('login') }}">{ __('Login') }}</a>-->
                            </li>
                            @if (Route::has('register'))
                            <!--<li class="nav-item">
                                <a class="nav-link" href="{ route('register') }}">{{ __('Register') }}</a>
                            </li>-->
                            @endif
                            @else
                            <li class="nav-item dropdown">
                                <!-- <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                                 { __('Logout') }}
                                  <img style="height: 20px" src="{{ url('/') . '/images/logout.png' }}" title="Logout">
                                </a> -->
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">-->
                                    @csrf
                                </form>
                            </li>
                            @endguest
                        </ul>
                    </span>
                </div>
                <div class="hanging-items">
                    <div class="crane moveUpDown item1">
                        <img src="{{ url('/') . '/images/key.png' }}">
                    </div>
                </div>
            </div>
        </nav>
        <div>
            <main class="">
                @yield('content')
            </main>
        </div>
        <footer id="site-footer" name="site-footer">
            <div class="container text-center">
            </div>
        </footer>
        <div class="modal fade custom-modal" id="modalTimeOut" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <h4>Your time for this round is up. Please click continue to end the current round.</h4>
                    </div>
                    <div class="modal-footer">
                        <a id="modalTimeoutRedirect"  onclick="$('#modalTimeOut').modal('hide');" href="" class="btn btn-primary red-button round-button">Continue</a>
                    </div>
                </div>
            </div>
        </div>
        <script>
      
      
   </script>
    </body>

