@extends('layouts.app')

@section('content')

<section class="gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <h2 class="fw-bold mb-2 text-uppercase text-white">Register</h2>
                        <p class="text-white-50 mb-5">Please enter your details to create an account!</p>

                        <form action="{{ route('store') }}" method="POST">
                            @csrf
                            <!-- Name Input -->
                            <div class="form-outline form-white mb-4">
                                <input type="text" id="name" name="name" 
                                       class="form-control form-control-lg @error('name') is-invalid @enderror" 
                                       value="{{ old('name') }}" required />
                                <label class="form-label" for="name">Name</label>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email Input -->
                            <div class="form-outline form-white mb-4">
                                <input type="email" id="email" name="email" 
                                       class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                       value="{{ old('email') }}" required />
                                <label class="form-label" for="email">Email Address</label>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password Input -->
                            <div class="form-outline form-white mb-4">
                                <input type="password" id="password" name="password" 
                                       class="form-control form-control-lg @error('password') is-invalid @enderror" 
                                       required />
                                <label class="form-label" for="password">Password</label>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password Confirmation Input -->
                            <div class="form-outline form-white mb-4">
                                <input type="password" id="password_confirmation" name="password_confirmation" 
                                       class="form-control form-control-lg" required />
                                <label class="form-label" for="password_confirmation">Confirm Password</label>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-outline-light btn-lg px-5">Register</button>

                        </form>

                        <!-- Login Link -->
                        <div>
                            <p class="mt-3">Already have an account? <a href="{{ route('login') }}" class="text-white-50 fw-bold">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
