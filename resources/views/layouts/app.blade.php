<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('adminassets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminassets/css/login_register.css') }}" rel="stylesheet">
    <link href="{{ asset('adminassets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet">
 
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

</head>

<body>

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ URL('/') }}">Home Page</a>
            @if(auth()->check())
            <a class="btn" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                <i class="fa fa-bars me-2"></i>
            </a>

            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menu</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <nav class="nav flex-column">
                        
    @if(auth()->user()->role === 'admin')
        <a class="nav-link active" href="{{ route('home')}}">Dashboard</a>
        <a class="nav-link" href="{{ route('admin.profile') }}">Profile</a>
        <a class="nav-link" href="{{ route('admin.home') }}">Admin Panel</a>
        <a class="nav-link" href="{{ route('admin.password') }}">Change Password</a>
        <a class="nav-link" href="#">Help</a>
        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
    @else
        <a class="nav-link active" href="{{ route('home')}}">Dashboard</a>
        <a class="nav-link" href="{{ route('user.profile') }}">Profile</a>
        <a class="nav-link" href="{{ route('user.profile') }}">Your booking</a>
        <a class="nav-link" href="{{ route('user.password') }}">Change Password</a>
        <a class="nav-link" href="#">Help</a>
        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
    @endif



                    </nav>

                  
                </div>
        
            </div>
            @else
   
@endif
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('login')) ? 'active' : '' }}" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('register')) ? 'active' : '' }}" href="{{ route('register') }}">Register</a>
                    </li>
                    @else


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

   
        @yield('content')
        
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('adminassets/lib/chart/chart.min.js') }}"></script>
    <script src="{{ asset('adminassets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('adminassets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('adminassets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('adminassets/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('adminassets/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('adminassets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('adminassets/js/main.js') }}"></script>
</body>

</html>