@include('frontend.layouts.header')



<!-- Modal Search Start -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center">
                <div class="input-group w-75 mx-auto d-flex">
                    <input type="search" class="form-control bg-transparent p-3" placeholder="keywords" aria-describedby="search-icon-1">
                    <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Search End -->


<!-- Hero Start -->
<div class="container-fluid bg-light py-6 my-6 mt-0 ">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-7 col-md-12">
                <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-4 animated bounceInDown">{{ $settings['header_text']->value ?? 'Not set' }}</small>
                <h1 class="display-1 mb-4 animated bounceInDown">Book <span class="text-primary">Cater</span>Serv For Your Dream Event</h1>
                <a href="{{ route('book')}}" class="btn btn-primary border-0 rounded-pill py-3 px-4 px-md-5 me-4 animated bounceInLeft">Book Now</a>
                <a href="{{ route('login') }}" class="btn btn-primary border-0 rounded-pill py-3 px-4 px-md-5 animated bounceInLeft">Login</a>

            </div>
            <div class="col-lg-5 col-md-12">
                <img src="{{ asset('storage/service/' . ($settings['banner_image']->value ?? 'default-logo.png')) }}" class="img-fluid rounded animated zoomIn" alt="">
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->


<!-- About Satrt -->
<div class="container-fluid py-6">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5 wow bounceInUp" data-wow-delay="0.1s">
                <img src="{{ asset('storage/service/' . ($settings['about_image']->value ?? 'default-logo.png')) }}" class="img-fluid rounded" alt="">
            </div>
            <div class="col-lg-7 wow bounceInUp" data-wow-delay="0.3s">
                <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">About Us</small>
                <h1 class="display-5 mb-4">Trusted By 200 + satisfied clients</h1>
                <p class="mb-4">Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore eit esdioilore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullaemco laboeeiris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                    dolor iesdein reprehendeerit in voluptate velit esse cillum dolore.</p>
                <div class="row g-4 text-dark mb-5">
                    <div class="col-sm-6">
                        <i class="fas fa-share text-primary me-2"></i>Fresh and Fast food Delivery
                    </div>
                    <div class="col-sm-6">
                        <i class="fas fa-share text-primary me-2"></i>24/7 Customer Support
                    </div>
                    <div class="col-sm-6">
                        <i class="fas fa-share text-primary me-2"></i>Easy Customization Options
                    </div>
                    <div class="col-sm-6">
                        <i class="fas fa-share text-primary me-2"></i>Delicious Deals for Delicious Meals
                    </div>
                </div>
                <a href="{{ route('about') }}" class="btn btn-primary py-3 px-5 rounded-pill">About Us<i class="fas fa-arrow-right ps-2"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Fact Start-->
<div class="container-fluid faqt py-6">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-lg-7">
                <div class="row g-4">
                    <div class="col-sm-4 wow bounceInUp" data-wow-delay="0.3s">
                        <div class="faqt-item bg-primary rounded p-4 text-center">
                            <i class="fas fa-users fa-4x mb-4 text-white"></i>
                            <h1 class="display-4 fw-bold" data-toggle="counter-up">689</h1>
                            <p class="text-dark text-uppercase fw-bold mb-0">Happy Customers</p>
                        </div>
                    </div>
                    <div class="col-sm-4 wow bounceInUp" data-wow-delay="0.5s">
                        <div class="faqt-item bg-primary rounded p-4 text-center">
                            <i class="fas fa-users-cog fa-4x mb-4 text-white"></i>
                            <h1 class="display-4 fw-bold" data-toggle="counter-up">107</h1>
                            <p class="text-dark text-uppercase fw-bold mb-0">Expert Chefs</p>
                        </div>
                    </div>
                    <div class="col-sm-4 wow bounceInUp" data-wow-delay="0.7s">
                        <div class="faqt-item bg-primary rounded p-4 text-center">
                            <i class="fas fa-check fa-4x mb-4 text-white"></i>
                            <h1 class="display-4 fw-bold" data-toggle="counter-up">253</h1>
                            <p class="text-dark text-uppercase fw-bold mb-0">Events Complete</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 wow bounceInUp" data-wow-delay="0.1s">
                <div class="video">
                    <button type="button" class="btn btn-play" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Video -->
<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- 16:9 aspect ratio -->
                <div class="ratio ratio-16x9">
                    <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                        allow="autoplay"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fact End -->


<!-- Service Start -->
<div class="container-fluid service py-6">
    <div class="container">
        <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
            <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Our Services</small>
            <h1 class="display-5 mb-5">What We Offer</h1>
        </div>
        <div class="row g-4">
            @foreach($service as $index => $services)
            <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="{{ 0.1 + ($index * 0.2) }}s">
                <div class="bg-light rounded service-item">
                    <div class="service-content d-flex align-items-center justify-content-center p-4">
                        <div class="service-content-icon text-center">
                            <i class="fas fa-cheese fa-7x text-primary mb-4"></i>
                            <h4 class="mb-3">{{$services->service}}</h4>
                            <p class="mb-4">{{$services->details}}</p>
                            <a href="#" class="btn btn-primary px-4 py-2 rounded-pill">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Service End -->


<!-- Events Start -->
<div class="container-fluid event py-6">
    <div class="container">
        <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
            <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Latest Events</small>
            <h1 class="display-5 mb-5">Our Social & Professional Events Gallery</h1>
        </div>
        <div class="tab-class text-center">
            <ul class="nav nav-pills d-inline-flex justify-content-center mb-5 wow bounceInUp" data-wow-delay="{{ 0.1 + ($index * 0.2) }}s">
                <li class="nav-item p-2">
                    <a class="d-flex mx-2 py-2 border border-primary bg-light rounded-pill active" data-bs-toggle="pill" href="#tab-0">
                        <span class="text-dark" style="width: 150px;">All Events</span>
                    </a>
                </li>
                @foreach($events as $event)
                <li class="nav-item p-2">
                    <a class="d-flex py-2 mx-2 border border-primary bg-light rounded-pill" data-bs-toggle="pill" href="#tab-{{ $event->id }}">
                        <span class="text-dark" style="width: 150px;">{{ $event->event }}</span>
                    </a>
                </li>
                @endforeach
            </ul>
            <div class="tab-content">
                <div id="tab-0" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div class="row g-4">
                                @foreach($eventimage as $image)
                                <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="{{ 0.1 + ($index * 0.1) }}s">
                                    <div class="event-img position-relative">
                                        <img class="img-fluid rounded w-100" src="{{ asset('storage/service/' . $image->image) }}" width="100" height="100" alt="Event Image">
                                        <div class="event-overlay d-flex flex-column p-4">
                                            <h4 class="me-auto">{{ $image->event->event }}</h4>
                                            <a href="{{ asset('storage/service/' . $image->image) }}" data-lightbox="event-{{ $image->id }}" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                @foreach($events as $event)
                <div id="tab-{{ $event->id }}" class="tab-pane fade show p-0">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div class="row g-4">
                                @foreach($eventimage->where('event_id', $event->id) as $image)
                                <div class="col-md-6 col-lg-3">
                                    <div class="event-img position-relative">
                                        <img class="img-fluid rounded w-100" src="{{ asset('storage/service/' . $image->image) }}" width="100" height="100" alt="Event Image">
                                        <div class="event-overlay d-flex flex-column p-4">
                                            <h4 class="me-auto">{{ $event->event }}</h4>
                                            <a href="{{ asset('storage/service/' . $image->image) }}" data-lightbox="event-{{ $image->id }}" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @if($eventimage->where('event_id', $event->id)->isEmpty())
                                <div class="col-md-6 col-lg-3">
                                    <div class="event-img position-relative">
                                        <p>No images available for this event.</p>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


<!-- Events End -->

<!-- Menu Start -->
<!-- Menu Start -->
<div class="container-fluid new-menu py-6">
    <div class="container">
        <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
            <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Our Menu</small>
            <h1 class="display-5 mb-5">Most Popular Food in the World</h1>
        </div>
        <div class="new-tab-class text-center">
            <ul class="nav nav-pills d-inline-flex justify-content-center mb-5 wow bounceInUp" data-wow-delay="0.1s">
                <li class="nav-item p-2">
                    <a class="d-flex py-2 mx-2 border border-primary bg-light rounded-pill active" data-bs-toggle="pill" href="#tab-all">
                        <span class="text-dark" style="width: 150px;">All Menu</span>
                    </a>
                </li>
                @foreach($menuCategories as $category)
                <li class="nav-item p-2">
                    <a class="d-flex py-2 mx-2 border border-primary bg-light rounded-pill" data-bs-toggle="pill" href="#tab-category-{{ $category->id }}">
                        <span class="text-dark" style="width: 150px;">{{ $category->menu }}</span>
                    </a>
                </li>
                @endforeach
            </ul>
            <div class="tab-content">
                <!-- All Menu Tab -->
                <div id="tab-all" class="tab-pane fade show active">
                    <div class="row g-4">
                        @foreach($allMenuItems as $index => $item)
                        <div class="col-lg-6 wow bounceInUp" data-wow-delay="{{ 0.05 + ($index * 0.05) }}s">
                            <div class="menu-item d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid rounded-circle" src="{{ asset('storage/menu/' . $item->image) }}" alt="">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                        <h4>{{ $item->dish }}</h4>
                                        <h4 class="text-primary">${{ number_format($item->price, 2) }}</h4>
                                    </div>
                                    <p class="mb-0">{{ $item->dish_details }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Individual Category Tabs -->
                @foreach($menuCategories as $category)
                <div id="tab-category-{{ $category->id }}" class="tab-pane fade">
                    <div class="row g-4">
                        @php
                            $categoryItems = $allMenuItems->where('menu_id', $category->id);
                        @endphp
                        @foreach($categoryItems as $index => $item)
                        <div class="col-lg-6 wow bounceInUp" data-wow-delay="{{ 0.05 + ($index * 0.05) }}s">
                            <div class="menu-item d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid rounded-circle" src="{{ asset('storage/menu/' . $item->image) }}" alt="">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                        <h4>{{ $item->dish }}</h4>
                                        <h4 class="text-primary">${{ number_format($item->price, 2) }}</h4>
                                    </div>
                                    <p class="mb-0">{{ $item->dish_details }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @if($categoryItems->isEmpty())
                        <div class="col-lg-6">
                            <div class="menu-item position-relative">
                                <p>No items available for this category.</p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- menu end -->



<!-- Book Us Start -->
<div class="container-fluid contact py-6 wow bounceInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row g-0">
            <div class="col-1">
                <img src="{{ asset('assets/img/background-site.jpg') }}" class="img-fluid h-100 w-100 rounded-start" style="object-fit: cover; opacity: 0.7;" alt="">
            </div>
            <div class="col-10">
                <div class="border-bottom border-top border-primary bg-light py-5 px-4">
                    <div class="text-center">
                        <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Book Us</small>
                        <h1 class="display-5 mb-5">Where you want Our Services</h1>
                    </div>

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    <form action="{{ route('booking.store') }}" method="POST">
                        @csrf
                        <div class="row g-4 form">
                        <div class="col-lg-4 col-md-6">
                            <select id="country" name="country" class="form-select border-primary p-2" required>
                                <option selected disabled>Select Country</option>
                                <option value="USA">USA</option>
                                <option value="UK">UK</option>
                                <option value="India">India</option>
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <select id="city" name="city" class="form-select border-primary p-2" required>
                                <option selected disabled>Select City</option>
                                <!-- Cities will be populated here based on country selection -->
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <select id="place" name="place" class="form-select border-primary p-2" required>
                                <option selected disabled>Select Place</option>
                                <!-- Places will be populated here based on city selection -->
                            </select>
                        </div>

                            <div class="col-lg-4 col-md-6">
                                <select name="event_type" class="form-select border-primary p-2" >
                                    <option selected disabled>Event Type</option>
                                    <option value="Big Event">Big Event</option>
                                    <option value="Small Event">Small Event</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <select name="no_of_palace" class="form-select border-primary p-2" >
                                    <option selected disabled>No. Of People</option>
                                    <option value="100-200">100-200</option>
                                    <option value="300-400">300-400</option>
                                    <option value="500-600">500-600</option>
                                    <option value="700-800">700-800</option>
                                    <option value="900-1000">900-1000</option>
                                    <option value="1000+">1000+</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <select name="diet" class="form-select border-primary p-2" >
                                    <option selected disabled>Please Select Diet</option>
                                    <option value="Vegetarian">Vegetarian</option>
                                    <option value="Non Vegetarian">Non Vegetarian</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <input type="text" name="contact_no" class="form-control border-primary p-2" placeholder="Your Contact No." >
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <input type="date" name="date" class="form-control border-primary p-2" >
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <input type="email" name="email" class="form-control border-primary p-2" placeholder="Enter Your Email" >
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <input type="name" name="name" class="form-control border-primary p-2" placeholder="Enter Your Name" >
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary px-5 py-3 rounded-pill">Submit Now</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <div class="col-1">
                <img src="{{ asset('assets/img/background-site.jpg') }}" class="img-fluid h-100 w-100 rounded-end" style="object-fit: cover; opacity: 0.7;" alt="">
            </div>
        </div>
    </div>
</div>
<!-- Book Us End -->


<!-- Team Start -->
<div class="container-fluid team py-6">
    <div class="container">
        <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
            <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Our Team</small>
            <h1 class="display-5 mb-5">We have experienced chef Team</h1>
        </div>
        <div class="row g-4">
            @foreach($teams as $index => $team)
            <div class="col-lg-3 col-md-6 wow bounceInUp" data-wow-delay="{{ 0.1 + ($index * 0.2) }}s">
                <div class="team-item rounded">
                    <img src="{{asset('storage/profiles/'. $team->profile)}}" class="imgs-fluid rounded-top">
                    <!-- <img class="img-fluid rounded-top " src="img/profile" alt=""> -->
                    <div class="team-content text-center py-3 bg-dark rounded-bottom">
                        <h4 class="text-primary">{{$team->name}}</h4>
                        <p class="text-white mb-0">{{$team->post}}</p>
                    </div>
                    <div class="team-icon d-flex flex-column justify-content-center m-4">
                        <a class="share btn btn-primary btn-md-square rounded-circle mb-2" href=""><i class="fas fa-share-alt"></i></a>
                        <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href="{{$team->facebook}}"><i class="fab fa-facebook-f"></i></a>
                        <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href="{{$team->twitter}}"><i class="fab fa-twitter"></i></a>
                        <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href="{{$team->instagram}}"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
<!-- Team End -->


<!-- Testimonial Start -->
<div class="container-fluid py-6">
    <div class="container">
        <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
            <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Testimonial</small>
            <h1 class="display-5 mb-5">What Our Customers says!</h1>
        </div>
        <div class="owl-carousel owl-theme testimonial-carousel testimonial-carousel-1 mb-4 wow bounceInUp" data-wow-delay="0.1s">
            <div class="testimonial-item rounded bg-light">
                <div class="d-flex mb-3">
                    <img src="{{asset('assets/img/testimonial-1.jpg')}}" class="img-fluid rounded-circle flex-shrink-0" alt="">
                    <div class="position-absolute" style="top: 15px; right: 20px;">
                        <i class="fa fa-quote-right fa-2x"></i>
                    </div>
                    <div class="ps-3 my-auto">
                        <h4 class="mb-0">Person Name</h4>
                        <p class="m-0">Profession</p>
                    </div>
                </div>
                <div class="testimonial-content">
                    <div class="d-flex">
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                    </div>
                    <p class="fs-5 m-0 pt-3">Lorem ipsum dolor sit amet elit, sed do eiusmod tempor ut labore et dolore magna aliqua.</p>
                </div>
            </div>
            <div class="testimonial-item rounded bg-light">
                <div class="d-flex mb-3">
                    <img src="{{asset('assets/img/testimonial-2.jpg')}}" class="img-fluid rounded-circle flex-shrink-0" alt="">
                    <div class="position-absolute" style="top: 15px; right: 20px;">
                        <i class="fa fa-quote-right fa-2x"></i>
                    </div>
                    <div class="ps-3 my-auto">
                        <h4 class="mb-0">Person Name</h4>
                        <p class="m-0">Profession</p>
                    </div>
                </div>
                <div class="testimonial-content">
                    <div class="d-flex">
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                    </div>
                    <p class="fs-5 m-0 pt-3">Lorem ipsum dolor sit amet elit, sed do eiusmod tempor ut labore et dolore magna aliqua.</p>
                </div>
            </div>
            <div class="testimonial-item rounded bg-light">
                <div class="d-flex mb-3">
                    <img src="{{asset('assets/img/testimonial-3.jpg')}}" class="img-fluid rounded-circle flex-shrink-0" alt="">
                    <div class="position-absolute" style="top: 15px; right: 20px;">
                        <i class="fa fa-quote-right fa-2x"></i>
                    </div>
                    <div class="ps-3 my-auto">
                        <h4 class="mb-0">Person Name</h4>
                        <p class="m-0">Profession</p>
                    </div>
                </div>
                <div class="testimonial-content">
                    <div class="d-flex">
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                    </div>
                    <p class="fs-5 m-0 pt-3">Lorem ipsum dolor sit amet elit, sed do eiusmod tempor ut labore et dolore magna aliqua.</p>
                </div>
            </div>
            <div class="testimonial-item rounded bg-light">
                <div class="d-flex mb-3">
                    <img src="{{asset('assets/img/testimonial-4.jpg')}}" class="img-fluid rounded-circle flex-shrink-0" alt="">
                    <div class="position-absolute" style="top: 15px; right: 20px;">
                        <i class="fa fa-quote-right fa-2x"></i>
                    </div>
                    <div class="ps-3 my-auto">
                        <h4 class="mb-0">Person Name</h4>
                        <p class="m-0">Profession</p>
                    </div>
                </div>
                <div class="testimonial-content">
                    <div class="d-flex">
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                    </div>
                    <p class="fs-5 m-0 pt-3">Lorem ipsum dolor sit amet elit, sed do eiusmod tempor ut labore et dolore magna aliqua.</p>
                </div>
            </div>
        </div>
        <div class="owl-carousel testimonial-carousel testimonial-carousel-2 wow bounceInUp" data-wow-delay="0.3s">
            <div class="testimonial-item rounded bg-light">
                <div class="d-flex mb-3">
                    <img src="{{asset('assets/img/testimonial-1.jpg')}}" class="img-fluid rounded-circle flex-shrink-0" alt="">
                    <div class="position-absolute" style="top: 15px; right: 20px;">
                        <i class="fa fa-quote-right fa-2x"></i>
                    </div>
                    <div class="ps-3 my-auto">
                        <h4 class="mb-0">Person Name</h4>
                        <p class="m-0">Profession</p>
                    </div>
                </div>
                <div class="testimonial-content">
                    <div class="d-flex">
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                    </div>
                    <p class="fs-5 m-0 pt-3">Lorem ipsum dolor sit amet elit, sed do eiusmod tempor ut labore et dolore magna aliqua.</p>
                </div>
            </div>
            <div class="testimonial-item rounded bg-light">
                <div class="d-flex mb-3">
                    <img src="{{asset('assets/img/testimonial-2.jpg')}}" class="img-fluid rounded-circle flex-shrink-0" alt="">
                    <div class="position-absolute" style="top: 15px; right: 20px;">
                        <i class="fa fa-quote-right fa-2x"></i>
                    </div>
                    <div class="ps-3 my-auto">
                        <h4 class="mb-0">Person Name</h4>
                        <p class="m-0">Profession</p>
                    </div>
                </div>
                <div class="testimonial-content">
                    <div class="d-flex">
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                    </div>
                    <p class="fs-5 m-0 pt-3">Lorem ipsum dolor sit amet elit, sed do eiusmod tempor ut labore et dolore magna aliqua.</p>
                </div>
            </div>
            <div class="testimonial-item rounded bg-light">
                <div class="d-flex mb-3">
                    <img src="{{asset('assets/img/testimonial-3.jpg')}}" class="img-fluid rounded-circle flex-shrink-0" alt="">
                    <div class="position-absolute" style="top: 15px; right: 20px;">
                        <i class="fa fa-quote-right fa-2x"></i>
                    </div>
                    <div class="ps-3 my-auto">
                        <h4 class="mb-0">Person Name</h4>
                        <p class="m-0">Profession</p>
                    </div>
                </div>
                <div class="testimonial-content">
                    <div class="d-flex">
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                    </div>
                    <p class="fs-5 m-0 pt-3">Lorem ipsum dolor sit amet elit, sed do eiusmod tempor ut labore et dolore magna aliqua.</p>
                </div>
            </div>
            <div class="testimonial-item rounded bg-light">
                <div class="d-flex mb-3">
                    <img src="{{asset('assets/img/testimonial-4.jpg')}}" class="img-fluid rounded-circle flex-shrink-0" alt="">
                    <div class="position-absolute" style="top: 15px; right: 20px;">
                        <i class="fa fa-quote-right fa-2x"></i>
                    </div>
                    <div class="ps-3 my-auto">
                        <h4 class="mb-0">Person Name</h4>
                        <p class="m-0">Profession</p>
                    </div>
                </div>
                <div class="testimonial-content">
                    <div class="d-flex">
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                    </div>
                    <p class="fs-5 m-0 pt-3">Lorem ipsum dolor sit amet elit, sed do eiusmod tempor ut labore et dolore magna aliqua.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->


<!-- Blog Start -->
<div class="container-fluid blog py-6">
    <div class="container">
        <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
            <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Our Blog</small>
            <h1 class="display-5 mb-5">Be First Who Read News</h1>
        </div>



        <div class="row gx-4 justify-content-center">
            @foreach ($Blog as $Blogs)
            <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.1s">
                <div class="blog-item">
                    <div class="overflow-hidden rounded">
                        <div class="img-container">
                            <a href="{{ asset('storage/profiles/' . $Blogs->image) }}" data-lightbox="blog-{{ $Blogs->id }}">
                                <img src="{{ asset('storage/profiles/' . $Blogs->image) }}" class="img-fluid w-100" alt="Blog Image">
                            </a>
                        </div>
                    </div>
                    <div class="blog-content d-flex rounded bg-light">
                        <div class="text-dark bg-primary rounded-start">
                            <div class="h-100 p-3 d-flex flex-column justify-content-center text-center">
                                <p class="fw-bold mb-0">{{ \Carbon\Carbon::parse($Blogs->created_at)->format('d M') }}</p>
                                <!-- <p class="fw-bold mb-0">Sep</p> -->
                            </div>
                        </div>
                        <a href="" class="h5 lh-base my-auto h-100 p-3">{{ $Blogs->name }}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>
<!-- Blog End -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    const citiesByCountry = {
        USA: [
            { name: "New York" },
            { name: "Los Angeles" },
            { name: "Chicago" }
        ],
        UK: [
            { name: "London" },
            { name: "Manchester" },
            { name: "Birmingham" }
        ],
        India: [
            { name: "Mumbai" },
            { name: "Delhi" },
            { name: "Bangalore" }
        ]
    };

    const placesByCity = {
        "New York": ["Central Park", "Statue of Liberty"],
        "Los Angeles": ["Hollywood", "Disneyland"],
        "Chicago": ["Willis Tower", "Navy Pier"],
        "London": ["Big Ben", "London Eye"],
        "Manchester": ["Old Trafford", "The Lowry"],
        "Birmingham": ["Bullring", "Birmingham Museum"],
        "Mumbai": ["Gateway of India", "Marine Drive"],
        "Delhi": ["Red Fort", "India Gate"],
        "Bangalore": ["Cubbon Park", "Vidhana Soudha"]
    };

    $('#country').change(function() {
        const selectedCountry = $(this).val();
        const cities = citiesByCountry[selectedCountry] || [];

        $('#city').empty().append('<option selected>Select City</option>');
        $.each(cities, function(index, city) {
            $('#city').append(`<option value="${city.name}">${city.name}</option>`);
        });
        $('#place').empty().append('<option selected>Select Place</option>'); // Reset places
    });

    $('#city').change(function() {
        const selectedCity = $(this).val();
        const places = placesByCity[selectedCity] || [];

        $('#place').empty().append('<option selected>Select Place</option>');
        $.each(places, function(index, place) {
            $('#place').append(`<option value="${place}">${place}</option>`);
        });
    });
});
</script>

@include('frontend.layouts.footer')