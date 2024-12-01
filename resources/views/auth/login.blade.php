@extends('layouts.app')

@section('content')

<section class="gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <div class=" mt-md-4">

                            <h2 class="fw-bold mb-2 text-uppercase text-white">Login</h2>
                            <p class="text-white-50 mb-5">Please enter your login and password!</p>

                            <form action="{{ route('authenticate') }}" method="POST">
                                @csrf
                            <!-- Email Input -->
                            <div class="form-outline form-white mb-4">
                                <input type="email" id="email" name="email" 
                                       class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                       value="{{ old('email') }}"  />
                                <label class="form-label" for="email">Email</label>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password Input -->
                            <div class="form-outline form-white mb-4">
                                <input type="password" id="password" name="password" 
                                       class="form-control form-control-lg @error('password') is-invalid @enderror" 
                                        />
                                <label class="form-label" for="password">Password</label>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            
                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-outline-light btn-lg px-5">Login</button>

                           
                            </form>
                            <!-- Forgot Password Link -->
                            <p class="small my-3"><a class="text-white-50" href="{{ route('password.request') }}">Forgot password?</a></p>

                        </div>

                        <!-- Sign Up Link -->
                        <div>
                            <p class="mb-0">Don't have an account? <a href="{{ route('register') }}" class="text-white-50 fw-bold">Sign Up</a></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
