<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>CaterServ - Catering Services Website Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playball&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="{{ asset('assets/lib/animate/animate.min.css') }}" rel="stylesheet">
        <link href="{{asset('assets/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/lib/owlcarousel/owl.carousel.min.css')}}" rel="stylesheet">
        
        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
      
        <!-- Template Stylesheet -->
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

        <style>
              :root {
        --button-color: {{ $settings['button_color']->value ?? '#ffffff' }}; 
        --button-bg: {{ $settings['button_bg']->value ?? '#ffffff' }}; 
        --body-bg: {{ $settings['body_bg']->value ?? '#ffffff' }}; 
        --footer-bg: {{ $settings['footer_bg']->value ?? '#ffffff' }}; 
        --header-bg: {{ $settings['header_bg']->value ?? '#ffffff' }}; 
        --header-active: {{ $settings['header_activecolor']->value ?? '#ffffff' }}; 
        --hover-active-color: {{ $settings['hover_active_color']->value ?? '#ffffff' }}; 
    
    }

    .btn-primary {
    color:var(--button-color);
    background-color: var( --button-bg);
    border-color:var( --button-bg);
}

.nav-bar {
    background: var(--header-bg);
}

.bg-light {
    background-color:var(--footer-bg) !important;
}

.navbar .navbar-nav .nav-link:hover, .navbar .navbar-nav .nav-link.active {
    color: var(--header-active);
}
.text-primary {
    color: var(--header-active) !important;
}

.event .tab-class .nav-item a.active {
    background: var(--header-active) !important;
}

.menu .nav-item a.active {
    background: var(--header-active) !important;
}

a {
    color: var(--header-active);
    text-decoration: none;
}
.border-primary {
    border-color:  var(--header-active) !important;
}
.bg-primary {
    background-color: var(--header-active)!important;
}

.btn.btn-primary:hover {
    background: var(--bs-dark) !important;
    color: var(--hover-active-color) !important;
}

.event .event-img .event-overlay {
    background: rgba(212, 167, 98, 0.7);
}

body {
   
    color: #9a9a9a;
    background-color: var(--body-bg);
   }

        </style>
    </head>

    <body>

    


    
 <!-- Spinner Start -->
  <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div> 
        <!-- Spinner End -->


        <!-- Navbar start -->
        <div class="container-fluid nav-bar">
            <div class="container">
                <nav class="navbar navbar-light navbar-expand-lg py-4">
                    <a href="{{ route('index') }}" class="navbar-brand">
                        <h1 class="text-primary fw-bold mb-0">Cater<span class="text-dark">Serv</span> </h1>
                    </a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto">
    <a href="{{ route('index') }}" class="nav-item nav-link {{ request()->routeIs('index') ? 'active' : '' }}">Home</a>
    <a href="{{ route('about') }}" class="nav-item nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About</a>
    <a href="{{ route('services') }}" class="nav-item nav-link {{ request()->routeIs('services') ? 'active' : '' }}">Services</a>
    <a href="{{ route('events') }}" class="nav-item nav-link {{ request()->routeIs('events') ? 'active' : '' }}">Events</a>
    <a href="{{ route('menu') }}" class="nav-item nav-link {{ request()->routeIs('menu') ? 'active' : '' }}">Menu</a>
    <div class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
        <div class="dropdown-menu bg-light">
            <a href="{{ route('book') }}" class="dropdown-item">Booking</a>
            <a href="{{ route('blog') }}" class="dropdown-item">Our Blog</a>
            <a href="{{ route('team') }}" class="dropdown-item">Our Team</a>
            <a href="{{ route('testimonial') }}" class="dropdown-item">Testimonial</a>
            </div>
    </div>
    <a href="{{ route('contact') }}" class="nav-item nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
</div>

                        <button class="btn-search btn btn-primary btn-md-square me-4 rounded-circle d-none d-lg-inline-flex" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search"></i></button>
                        @auth
    <a href="{{ route('home') }}" class="btn btn-primary py-2 px-4 d-none d-xl-inline-block rounded-pill">Dashboard</a>
@endauth

@guest
    <a href="{{ route('login') }}" class="btn btn-primary py-2 px-4 d-none d-xl-inline-block rounded-pill">Log In</a>
@endguest              
      </div>
                </nav>
            </div>
        </div>
        <!-- Navbar End -->