
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
                <h1 class="display-1 mb-4">Menu</h1>
                <ol class="breadcrumb justify-content-center mb-0 animated bounceInDown">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-dark" aria-current="page">Menu</li>
                </ol>
            </div>
        </div>
        <!-- Hero End -->

<!-- Menu Start -->
<div class="container-fluid menu py-6">
    <div class="container">
        <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
            <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Our Menu</small>
            <h1 class="display-5 mb-5">Most Popular Food in the World</h1>
        </div>
        <div class="tab-class text-center">
            <ul class="nav nav-pills d-inline-flex justify-content-center mb-5 wow bounceInUp" data-wow-delay="0.1s">
                <li class="nav-item p-2">
                    <a class="d-flex py-2 mx-2 border border-primary bg-light rounded-pill active" data-bs-toggle="pill" href="#tab-all">
                        <span class="text-dark" style="width: 150px;">All Menu</span>
                    </a>
                </li>
                @foreach($menuCategories as $category)
                <li class="nav-item p-2">
                    <a class="d-flex py-2 mx-2 border border-primary bg-light rounded-pill" data-bs-toggle="pill" href="#tab-{{ $category->id }}">
                        <span class="text-dark" style="width: 150px;">{{ $category->menu }}</span>
                    </a>
                </li>
                @endforeach
            </ul>
            <div class="tab-content">
                <!-- All Menu Tab -->
                <div id="tab-all" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        @foreach($allMenuItems as $index => $item)
                        <div class="col-lg-6 wow bounceInUp" data-wow-delay="{{ 0.1 + ($index * 0.1) }}s">
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
                <div id="tab-{{ $category->id }}" class="tab-pane fade show p-0">
                    <div class="row g-4">
                        @php
                            $categoryItems = $allMenuItems->where('menu_id', $category->id);
                            
                        @endphp
                        @foreach($categoryItems as $index => $item)
                        <div class="col-lg-6 wow bounceInUp" data-wow-delay="{{ 0.1 + ($index * 0.1) }}s">
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


@include('frontend.layouts.footer')