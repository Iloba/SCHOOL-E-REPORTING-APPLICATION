<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="E-report is a web application that helps parents track their Ward's academic progress with ease.">
    <meta name="author" content="Emeka Timothy Iloba. Fullstack Developer">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="/img/e-fav.png">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="js/app.js" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="css/app.css" rel="stylesheet">

    <!--icofont-->
    <link rel="stylesheet" href="icofont/icofont/icofont.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

</head>
<body onload="preloaderFunction()">
    <div id="loading"></div>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm py-3">
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
                                    <a class="nav-link text-success" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item ml-2" >
                                    <a id="nav-btn" class="nav-link" href="{{ route('register') }}">{{ __('Get Started') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{-- {{ Auth::user()->name }} --}}

                                    @if (Auth::user()->avatar)

                                    <img width="40" class="img-fluid rounded-circle" src="{{asset('uploads/passports/'.Auth::user()->avatar)}}" alt="Avatar">
                                
                                    @endif

                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('students_list') }}">
                                        Students List
                                    </a>

                                    <a class="dropdown-item" href="{{ route('edit-user-profile', Auth::user()->id) }}">
                                        Edit my Profile
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

        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{asset('./img/e-banner2.jpg')}}" class="d-block w-100" alt="E-report">
              </div>
              <div class="carousel-item">
                <img src="{{asset('./img/e-banner.jpg')}}" class="d-block w-100" alt="E-report">
              </div>
              <div class="carousel-item">
                <img src="{{asset('./img/e-banner.jpg')}}" class="d-block w-100" alt="E-report">
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
        <div class="section-one  mt-3 mb-3" data-aos="zoom-in" data-aos-duration="3000">
            <div class="container p-5">
                <div class="row">
                    <div class="col-md-6 p-5">
                        <h1 id="h1" class="text-center">Send students report electronically</h1>
                        <p class="text-center mt-2 line-h text-secondary">E-report helps parents track their ward's academic progress digitally. No more use of the analog way of recieving reports. 
                            Its a new era of recieving your ward's report electronically from the comfort of your mobile device. This process also reduces the cost of teachers printing out results(reports) and issuing to students.
                            E-report is open for all Schools and institution.
                        </p>
                        <div class="mt-3 mb-3">
                            <a style="width: 50%;" id="nav-btn" class="btn btn-info mx-auto d-block" href="{{route('register')}}">Get Started Now</a>
                        </div>
                    </div>
                    <div class="col-md-6 p-5">
                        <img class="img-fluid" src="{{asset('./img/sec1.jpg')}}" alt="E-report">
                    </div>
                </div>
            </div>
        </div>
        <div class="section-two" data-aos="fade-up"
        data-aos-duration="3000">
            <div>
                <img class="img-fluid" src="{{asset('./img/email-2.jpg')}}" alt="E-report">
            </div>
            
        </div>
        <div class="section-three " data-aos="flip-left"
        data-aos-duration="3000">
            <div class="container-fluid p-5">
                <h1 class="text-center mb-3">Get started with ease</h1>
                <div class="container mb-2">
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="card shadow">
                                <img class="img-fluid" src="{{asset('./img/register-student.png')}}" alt="E-report">
                                <div class="card-body">
                                    <h5 class="card-title"><b>Signup students as a teacher/school</b></h5>
                                    <p class="card-text text-secondary">
                                        After Succesful registration as a teacher, you can easily register your students.
                                         Data comprising of Student Name, Class, Gender, Age, Parent Name, Parent Email Address will be required when registering a new Student. 
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card shadow">
                                <img class="img-fluid" src="{{asset('./img/student-list.png')}}" alt="E-report">
                                <div class="card-body">
                                    <h5 class="card-title"><b>Manage registered students with ease</b></h5>
                                    <p class="card-text text-secondary">
                                        As a Teacher, registered on e-report, you can manage your  Students easily. Features are available for Updating and Deletion of Student Data.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="card shadow">
                                <img class="img-fluid" src="{{asset('./img/send-report.png')}}" alt="E-report">
                                <div class="card-body">
                                    <h5 class="card-title"><b>send report to parent's mail on a single click</b></h5>
                                    <p class="card-text text-secondary">
                                        As a teacher, you can send reports to each of your registered student's  parent individually, Attach report files and add a backup message for parents.
                                        Parents will be able to recieve reports in their mail boxes. 
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card shadow">
                                <img class="img-fluid" src="{{asset('./img/parent-mail.png')}}" alt="E-report">
                                <div class="card-body">
                                    <h5 class="card-title"><b>Parents will recieve report in their email in no time</b></h5>
                                    <p class="card-text text-secondary">
                                        Parents will be able to recieve reports from school teachers from the comfort of thier mobile devices or computers through their Email Addresses (Mail Boxes)
                                        and they will be able to track their ward's academic progress with ease.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="section-four">
           <div class="container p-5">
               <h2 class="text-center ">School Support System</h2>
                <div class="row">
                   <div class="col-md-12">
                    <p class="text-center text-secondary">
                        E-report is a support system open to use for Schools, institutions and Higher institutions.
                        
                    </p>
                   </div>
                </div>
           </div>
        </div>
        <footer class="justify-content-center shadow">
            <a href="/"><img class="footer-logo img-fluid mx-auto d-block mb-2" src="{{asset('./img/e-logo.png')}}" alt="E-report"></a>
            
            <div class="d-flex justify-content-center">
                <a target="_blank" class="nav-link text-secondary" href="https://twitter.com/e_schoolreport"> <i class="icofont-twitter"></i></a>
               <a target="_blank" class="nav-link text-secondary" href="#"> <i class="icofont-facebook"></i></a>
               <a target="_blank" class="nav-link text-secondary" href="#"> <i class="icofont-instagram"></i></a>
               <a target="_blank" class="nav-link text-secondary" href="#"> <i class="icofont-linkedin"></i></a>
            </div>
            <p class="text-center mt-2">&copy; e-report  @php
                echo date('Y'); 
            @endphp @bellonix integrated technologies</p>
        </footer>
    </div>


<script>
    var preloader = document.getElementById('loading');

    function preloaderFunction(){
        preloader.style.display = 'none';

    }
</script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $(function() {
         AOS.init();
    });
</script>
</body>
</html>
