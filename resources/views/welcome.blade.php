<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!--icofont-->
    <link rel="stylesheet" href="{{asset('icofont/icofont/icofont.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link rel="icon" href="{{asset('/img/e-fav.png')}}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm p-3">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img class="img-fluid logo" src="{{asset('/img/e-logo.png')}}" alt="E-report">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item mr-4">
                                    <a  class="nav-link text-success" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item ml-2">
                                    <a id="nav-btn" class="nav-link btn btn-success" href="{{ route('register') }}">{{ __('Get Started') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}

                                    @if (Auth::user()->avatar)

                                    <img width="40" class="img-fluid rounded-circle" src="{{asset('storage/passports/'.Auth::user()->avatar)}}" alt="Avatar">
                                
                                    @endif

                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('students_list') }}">
                                        Students List
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
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{asset('./img/slider.jpg')}}" class="d-block w-100" alt="E-report">
              </div>
              <div class="carousel-item">
                <img src="{{asset('./img/slider.jpg')}}" class="d-block w-100" alt="E-report">
              </div>
              <div class="carousel-item">
                <img src="{{asset('./img/slider.jpg')}}" class="d-block w-100" alt="E-report">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        <div class="section-one">
            <div class="container ">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <h1 id="h1" class="text-center">Send reports faster</h1>
                        <h3 class="text-center mt-2">The ease & simplicity of E-report, wherever you are.</h3>
                        <div class="mt-3">
                            <a style="width: 50%;" id="nav-btn" class="btn btn-info mx-auto d-block" href="{{route('register')}}">Get Started Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-two">
            <img class="img-fluid" src="{{asset('./img/gmail.png')}}" alt="E-report">
        </div>
        <div class="section-three">
            <div class="container-fluid">
                <div class="container">
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="card shadow">
                                <img class="img-fluid" src="{{asset('./img/slider.jpg')}}" alt="E-report">
                                <div class="card-body">
                                    <h5 class="card-title">card Title</h5>
                                    <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veritatis, laboriosam necessitatibus tenetur labore soluta ipsum doloribus quibusdam voluptatum vel eaque 
                                        itaque sed repellendus, quam recusandae nam iure, illo earum accusamus.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card shadow">
                                <img class="img-fluid" src="{{asset('./img/slider.jpg')}}" alt="E-report">
                                <div class="card-body">
                                    <h5 class="card-title">card Title</h5>
                                    <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veritatis, laboriosam necessitatibus tenetur labore soluta ipsum doloribus quibusdam voluptatum vel eaque 
                                        itaque sed repellendus, quam recusandae nam iure, illo earum accusamus.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-four">
           <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <img id="logo-down" class="img-fluid mx-auto d-block" src="{{asset('./img/e-logo.png')}}" alt="E-report">
                        <h1 id="h1" class="text-center mt-3">Get started with e-report</h1>
                        <div class="mt-3">
                            <a id="nav-btn" class="btn btn-info mx-auto d-block" href="{{route('register')}}">Create an Account</a>
                        </div>
                    </div>
                </div>
           </div>
        </div>
        <footer class="justify-content-center">
            <a href="/"><img class="footer-logo img-fluid mx-auto d-block mb-2" src="{{asset('./img/e-logo.png')}}" alt="E-report"></a>
            
            <div class="d-flex justify-content-center">
               <a class="nav-link text-secondary" href="#"> <i class="icofont-facebook"></i></a>
               <a class="nav-link text-secondary" href="#"> <i class="icofont-instagram"></i></a>
               <a class="nav-link text-secondary" href="#"> <i class="icofont-twitter"></i></a>
               <a class="nav-link text-secondary" href="#"> <i class="icofont-linkedin"></i></a>
            </div>
            <p class="text-center mt-2">&copy; e-report 2021</p>
        </footer>

       
    </div>
</body>
</html>
