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
<div class="container-fluid bg-light py-6 my-6 mt-0">
    <div class="container text-center animated bounceInDown">
        <h1 class="display-1 mb-4">Booking</h1>
        <ol class="breadcrumb justify-content-center mb-0 animated bounceInDown">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item text-dark" aria-current="page">Booking</li>
        </ol>
    </div>
</div>
<!-- Hero End -->


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
                                    <option selected disabled>No. Of Palace</option>
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