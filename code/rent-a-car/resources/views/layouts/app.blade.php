<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <style>
        
    @media only screen and (min-width: 992px) {
        /* For desktop: */
        .col-b-1 {width: 8.33%;}
        .col-b-2 {width: 16.66%;}
        .col-b-3 {width: 25%;}
        .col-b-4 {width: 33.33%;}
        .col-b-5 {width: 41.66%;}
        .col-b-6 {width: 50%;}
        .col-b-7 {width: 58.33%;}
        .col-b-8 {width: 66.66%;}
        .col-b-9 {width: 75%;}
        .col-b-10 {width: 83.33%;}
        .col-b-11 {width: 91.66%;}
        .col-b-12 {width: 100%;}
        .image{
            width:290px; 
            height:183px;
        }
        
    }
    @media only screen and (max-width: 992px) {
        .col-m-1 {width: 8.33%;}
        .col-m-2 {width: 16.66%;}
        .col-m-3 {width: 25%;}
        .col-m-4 {width: 33.33%;}
        .col-m-5 {width: 41.66%;}
        .col-m-6 {width: 50%;}
        .col-m-7 {width: 58.33%;}
        .col-m-8 {width: 66.66%;}
        .col-m-9 {width: 75%;}
        .col-m-10 {width: 83.33%;}
        .col-m-11 {width: 91.66%;}
        .col-m-12 {width: 100%;}
        .image-m{
            width:220px; 
            height:120px;
        }
    }

        html, body {
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        .content {
            flex: 1 0 auto;
        }
        .footer {
            flex-shrink: 0;
        }
        </style>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
 
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class='content'>
    <div id="app">
            <nav class="navbar navbar-expand navbar-dark bg-primary">
                    <a class="pull-left tz_logo"  title="Rent a car">
                                             <a class="navbar-brand" href="#">{{config('app.name','LsApp')}}</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                  
                    <div class="navbar-collapse" id="navbarsExampleDefault">
                            <ul class="navbar-nav mr-auto">
                                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="/about">About</a>
                                  </li>
                
                    
                            </ul>
        
                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                <li class="nav-item">
                                    <a class="nav-link" href="/reservations">My reservations</a>
                                </li>
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>
        
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
        
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </nav>

        <main  style="padding:0 !important;">
            @yield('content')
        </main>
    </div>
</div>
 <!-- Footer -->
 
        <footer class='footer py-2 ' style="background-color:#F0FFF0">
         <p class="text-center " style="color:	#808080">©2019 Iva Knezevic</p>
        </footer>
</body>
</html>
