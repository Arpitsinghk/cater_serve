<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Catering services</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('adminassets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminassets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('adminassets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('adminassets/css/style.css') }}" rel="stylesheet">

    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />

<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">

<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<style>
    /* body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
    } */
    h1 {
        text-align: center;
        font-size: 36px;
        color: #4A90E2;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 20px;
    }
</style>
<style>
    body {
        transition: background-color 0.3s ease, color 0.3s ease !important;
        font-family: Arial, sans-serif !important;
    }
    .sidebar, .navbar {
        transition: background-color 0.3s ease !important;
    }

    /* Light and Dark Mode */
    body.light-mode {
        background-color: white !important;
        color: black !important;
    }
    body.dark-mode {
        background-color: black !important;
        color: white !important;
    }

    .sidebar.light-mode {
        background-color: #f8f9fa !important;
    }

    .sidebar.dark-mode {
        background-color: #333 !important;
    }

    .navbar.light-mode {
        background-color: #f8f9fa !important;
    }

    .navbar.dark-mode {
        background-color: #333 !important;
    }
    
    .form-check-label {
        padding-left: 10px !important;
    }
    .content.light-mode {
        background-color: #f4f6f9 !important;
        color: black !important;
    }

    .content.dark-mode {
        background-color: #212529 !important;
        color: white !important;
    }

    /* Default Light Mode */
    .nav-link {
        color: black !important; /* Light mode text color */
    }

    .nav-link:hover {
        color: #007bff !important; /* Light mode hover color */
    }

    .nav-item.dropdown .nav-link {
        color: black !important;
    }

    /* Light Mode Specific Styles */
    body.light-mode .navbar-nav .nav-link {
        color: black !important;
    }

    body.light-mode .navbar-nav .nav-link i {
        color: #000 !important;
    }
.nav-link i{
    background-color: transparent !important;
    }

    body.light-mode .navbar-nav .dropdown-item {
        color: black !important;
    }

    body.light-mode .navbar-nav .dropdown-item:hover {
        background-color: #f8f9fa !important;
    }

    /* Dark Mode Specific Styles */
    body.dark-mode .navbar-nav .nav-link {
        color: white !important; /* Dark mode text color */
    }

    body.dark-mode .navbar-nav .nav-link i {
        color: white !important; /* Dark mode icon color */
    }

    body.dark-mode .navbar-nav .nav-link:hover {
        color: #ffc107 !important; /* Dark mode hover color */
    }

    body.dark-mode .navbar-nav .dropdown-item {
        color: white !important;
    }

    body.dark-mode .navbar-nav .dropdown-item:hover {
        background-color: #444 !important; /* Dark mode dropdown item hover */
    }

    /* Dark Mode for Navbar */
    body.dark-mode .navbar {
        background-color: #333 !important;
        color: white !important;
    }
</style>

</head>

<body class="light-mode">
    <div class="container-xxl position-relative bg-white d-flex p-0">

         <!-- Sidebar Start -->
         <div class="sidebar pe-4 pb-3">
            <nav class="navbar">
               <a href="{{ URL('/admin/home') }}" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Admin</h3>
                    </a>
                   
                
               <!-- Bootstrap switch toggle -->
   
  
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                    @if($user->profile)
                <img src="{{ asset('storage/profiles/' . $user->profile) }}" class="rounded-circle me-lg-2" style="width: 40px; height: 40px;" alt="Current Profile Image">
                @else
                <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                @endif
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3 bg-light rounded ">
                            <h6 class="mb-0 fw-bold">{{ $user->name }}</h6>
                            <div class="mt-1">
                                <span class="fw-semibold">Role:</span>
                                <span class="text-primary">{{ $user->role }}</span>
                            </div>
                        </div>
                </div>
                <div class="navbar-nav w-100">
                <a href="{{ URL('/admin/home') }}" class="nav-item nav-link {{ request()->is('home') ? 'active' : '' }}">
                <i class="fa fa-tachometer-alt me-2"></i>Dashboard
            </a>
            <a href="{{ URL('/home') }}" class="nav-item nav-link {{ request()->is('home') ? 'active' : '' }}">
                <i class="fa fa-home me-2"></i>Main Panel
            </a>

            <a href="{{ route('user.admin') }}" class="nav-item nav-link {{ request()->routeIs('user.admin') ? 'active' : '' }}">
            <i class="fa fa-user me-2"></i>Users
            </a>

            <a href="{{ route('teams.admin') }}" class="nav-item nav-link {{ request()->routeIs('teams.admin') ? 'active' : '' }}">
            <i class="fa fa-users me-2"></i>Teams
            </a>
           
            <a href="{{ route('setting.admin') }}" class="nav-item nav-link {{ request()->routeIs('setting.admin') ? 'active' : '' }}">
            <i class="fa fa-cog me-2"></i>Settings
            </a>

            <a href="{{ route('blog.admin') }}" class="nav-item nav-link {{ request()->routeIs('blog.admin') ? 'active' : '' }}">
            <i class="fa fa-pencil-alt me-2"></i>Blogs
            </a>

            <a href="{{ route('booking.admin') }}" class="nav-item nav-link {{ request()->routeIs('booking.admin') ? 'active' : '' }}">
            <i class="fa fa-calendar-check me-2"></i>Booking
            </a>

            <a href="{{ route('service.admin') }}" class="nav-item nav-link {{ request()->routeIs('service.admin') ? 'active' : '' }}">
            <i class="fa fa-concierge-bell me-2"></i>
            Services
            </a>
                      <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-calendar-alt me-2"></i>
                        Events</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ route('event_category.admin') }}" class="dropdown-item {{ request()->routeIs('event_category.admin') ? 'active' : '' }}">
                                   Events Category
                                </a>
                            <a href="{{ route('event_image.admin') }}" class="dropdown-item {{ request()->routeIs('event_image.admin') ? 'active' : '' }}">
                                   Events Image
                                </a>
                        </div>
                    </div>
                      <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-bars me-2"></i>
                        Menus</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ route('menus.admin') }}" class="dropdown-item {{ request()->routeIs('menus.admin') ? 'active' : '' }}">
                                   Menus Category
                                </a>
                            <a href="{{ route('menus_bar.admin') }}" class="dropdown-item {{ request()->routeIs('menus_bar.admin') ? 'active' : '' }}">
                                Menus bar
                                </a>
                        </div>
                    </div>
        
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> 
        <!-- Spinner End -->

        

<div class="content">
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand sticky-top px-4 py-0">
        <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
            <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
        </a>
        <a href="#" class="sidebar-toggler flex-shrink-0">
            <i class="fa fa-bars"></i>
        </a>
        <form class="d-none d-md-flex ms-4">
            <input class="form-control border-0" type="search" placeholder="Search">
        </form>
        
        <div class="navbar-nav align-items-center ms-auto">
            
            <div class="nav-item dropdown  form-check form-switch">
                   <input class="form-check-input" type="checkbox" role="switch" title="switch to dark or light mode" id="flexSwitchCheckChecked" >
               </div>
            <div class="nav-item dropdown">
            
                <a class="nav-link" href="{{ URL('/') }}"><i class="fa fa-globe me-2" title="Go to Website"></i></a>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fa fa-envelope me-lg-2"></i>
                    <span class="d-none d-lg-inline-flex">Message</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                    <a href="#" class="dropdown-item">
                        <div class="d-flex align-items-center">
                            <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <div class="ms-2">
                                <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                <small>15 minutes ago</small>
                            </div>
                        </div>
                    </a>
                    <hr class="dropdown-divider">
                    <a href="#" class="dropdown-item">
                        <div class="d-flex align-items-center">
                            <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <div class="ms-2">
                                <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                <small>15 minutes ago</small>
                            </div>
                        </div>
                    </a>
                    <hr class="dropdown-divider">
                    <a href="#" class="dropdown-item">
                        <div class="d-flex align-items-center">
                            <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <div class="ms-2">
                                <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                <small>15 minutes ago</small>
                            </div>
                        </div>
                    </a>
                    <hr class="dropdown-divider">
                    <a href="#" class="dropdown-item text-center">See all message</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle position-relative" data-bs-toggle="dropdown">
                    <i class="fa fa-bell me-lg-2"></i>
                    <!-- <span class="badge bg-danger position-absolute" style="top: 0; right: 0; display: {{ $notificationCount > 0 ? 'block' : 'none' }};">
    {{ $notificationCount }}
</span> -->

                    <span class="badge bg-danger position-absolute" style="top: 15px; left: 29px;">
                        {{ $notificationCount }}
                        {{-- $highlightedCount --}}
                    </span>
                    <span class="d-none d-lg-inline-flex">Notifications</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                    @foreach($notifications as $notification)
                        <a href="#" class="dropdown-item">
                            <h6 class="fw-normal mb-0">{{ $notification->message }}</h6>
                            <small>{{ $notification->created_at->diffForHumans() }}</small>
                        </a>
                        <hr class="dropdown-divider">
                    @endforeach
                    <a href="#" class="dropdown-item text-center">See all notifications</a>
                </div>
            </div>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                @if($user->profile)
                <img src="{{ asset('storage/profiles/' . $user->profile) }}" class="rounded-circle me-lg-2" style="width: 40px; height: 40px;" alt="Current Profile Image">
                @else
                <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                @endif
                    <span class="d-none d-lg-inline-flex">{{ $user->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                    <a href="{{route('admin.profile')}}" class="dropdown-item">My Profile</a>
                    <a href="{{route('admin.bsetting')}}" class="dropdown-item">Settings</a>
                    <a href="{{route('logout') }}" class="dropdown-item">Log Out</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

        <div>
            @yield('content')
        </div>

        <!-- JavaScript Libraries -->
        <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
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
        <script>
    // Get the checkbox, body, sidebar, navbar, and content elements
    const switchButton = document.getElementById('flexSwitchCheckChecked');
    const body = document.body;
    const sidebar = document.querySelector('.sidebar');
    const navbar = document.querySelector('.navbar');
    const content = document.querySelector('.content');
    
    // Initial setup based on the default state of the checkbox
    if (switchButton.checked) {
        // Apply dark mode initially if the checkbox is checked
        body.classList.add('dark-mode');
        body.classList.remove('light-mode');
        sidebar.classList.add('dark-mode');
        sidebar.classList.remove('light-mode');
        navbar.classList.add('dark-mode');
        navbar.classList.remove('light-mode');
        content.classList.add('dark-mode');
        content.classList.remove('light-mode');
    }

    // Add event listener for the switch
    switchButton.addEventListener('change', () => {
        if (switchButton.checked) {
            // Switch to dark mode
            body.classList.add('dark-mode');
            body.classList.remove('light-mode');
            sidebar.classList.add('dark-mode');
            sidebar.classList.remove('light-mode');
            navbar.classList.add('dark-mode');
            navbar.classList.remove('light-mode');
            content.classList.add('dark-mode');
            content.classList.remove('light-mode');
        } else {
            // Switch to light mode
            body.classList.add('light-mode');
            body.classList.remove('dark-mode');
            sidebar.classList.add('light-mode');
            sidebar.classList.remove('dark-mode');
            navbar.classList.add('light-mode');
            navbar.classList.remove('dark-mode');
            content.classList.add('light-mode');
            content.classList.remove('dark-mode');
        }
    });
</script>


    </div>
</body>

</html>
