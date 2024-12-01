
     
      <!-- Footer Start -->
        <div class="container-fluid footer py-6 my-6 mb-0 bg-light wow bounceInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-item">
                            <h1 class="text-primary">Cater<span class="text-dark">Serv</span></h1>
                            <p class="lh-lg mb-4">{{ $settings['footer_details']->value ?? 'Not set' }}</p>
                            <div class="footer-icon d-flex">
                                <a class="btn btn-primary btn-sm-square me-2 rounded-circle" href="{{ $settings['footer_facebook']->value ?? 'Not set' }}"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-primary btn-sm-square me-2 rounded-circle" href="{{ $settings['footer_twitter']->value ?? 'Not set' }}"><i class="fab fa-twitter"></i></a>
                                <a href="{{ $settings['footer_instagram']->value ?? 'Not set' }}" class="btn btn-primary btn-sm-square me-2 rounded-circle"><i class="fab fa-instagram"></i></a>
                                <a href="{{ $settings['footer_linkdin']->value ?? 'Not set' }}" class="btn btn-primary btn-sm-square rounded-circle"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-item">
                            <h4 class="mb-4">Special Facilities</h4>
                            <div class="d-flex flex-column align-items-start">
                                <a class="text-body mb-3" href=""><i class="fa fa-check text-primary me-2"></i>{{ $settings['facility_1']->value ?? 'Not set' }}</a>
                                <a class="text-body mb-3" href=""><i class="fa fa-check text-primary me-2"></i>{{ $settings['facility_2']->value ?? 'Not set' }}</a>
                                <a class="text-body mb-3" href=""><i class="fa fa-check text-primary me-2"></i>{{ $settings['facility_3']->value ?? 'Not set' }}</a>
                                <a class="text-body mb-3" href=""><i class="fa fa-check text-primary me-2"></i>{{ $settings['facility_4']->value ?? 'Not set' }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-item">
                            <h4 class="mb-4">Contact Us</h4>
                            <div class="d-flex flex-column align-items-start">
                                <p><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $settings['footer_address']->value ?? 'Not set' }}</p>
                                <p><i class="fa fa-phone-alt text-primary me-2"></i>{{ $settings['mobile']->value ?? 'Not set' }}</p>
                                <p><i class="fas fa-envelope text-primary me-2"></i>{{ $settings['email']->value ?? 'Not set' }}</p>
                                <p><i class="fa fa-clock text-primary me-2"></i> {{ $settings['service_timming']->value ?? 'Not set' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-item">
                            <h4 class="mb-4">Social Gallery</h4>
                            <div class="row g-2">
                                <div class="col-4">
                                <img src="{{ asset('storage/service/' . ($settings['social_img1']->value ?? 'default-logo.png')) }}" class="img-fluid rounded-circle border border-primary p-2" alt="">
                                </div>
                                <div class="col-4">
                                <img src="{{ asset('storage/service/' . ($settings['social_img1']->value ?? 'default-logo.png')) }}" class="img-fluid rounded-circle border border-primary p-2" alt="">
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Copyright Start -->
        <div class="container-fluid copyright bg-dark py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <span class="text-light"><a href="#"><i class="fas fa-copyright text-light me-2"></i>{{ $settings['copy_right']->value ?? 'Not set' }}</a>, All right reserved.</span>
                    </div>
                    <div class="col-md-6 my-auto text-center text-md-end text-white">
                         Designed By <a class="border-bottom" href="{{ config('app.url') }}">{{ $settings['desgin_by']->value ?? 'Not set' }}</a> 
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-md-square btn-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   
        <a href="https://wa.me/8871574773" class="btn btn-md-square btn-whatsapp rounded-circle whatsup-bottom" target="_blank">
            <i class="fab fa-whatsapp"></i>
        </a>

        
        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template JavaScript -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    </body>
</html>