<x-layout-additional>
    <x-slot:title>Register</x-slot:title>

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg border-0 mt-5">
                <div class="card-body p-4 p-md-5">
                    <div class="text-center mb-4">
                        <h1 class="h3 mb-3 fw-normal">Create Your Account</h1>
                        <p class="text-muted">Join our community today</p>
                    </div>

                    @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <form action="/register" method="post">
                        @csrf
                        
                        <!-- Name Field -->
                        <div class="form-floating mb-3">
                            <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" 
                                id="name" placeholder="Full Name" required value="{{ old('name') }}">
                            <label for="name">Full Name</label>
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Username Field -->
                        <div class="form-floating mb-3">
                            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" 
                                id="username" placeholder="Username" required value="{{ old('username') }}">
                            <label for="username">Username</label>
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Email Field -->
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                                id="email" placeholder="email@example.com" required value="{{ old('email') }}">
                            <label for="email">Email Address</label>
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Password Field with validation hints -->
                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" 
                                id="password" placeholder="Password" required>
                            <label for="password">Password</label>
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-text mt-1">
                                Password must contain at least 8 characters with uppercase, lowercase, numbers, and symbols.
                            </div>
                        </div>

                        <!-- Location Field -->
                        <div class="form-floating mb-4">
                            <input type="text" name="location" class="form-control rounded-bottom @error('location') is-invalid @enderror" 
                                id="location" placeholder="Your Location" required value="{{ old('location') }}">
                            <label for="location">Location</label>
                            @error('location')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <button class="w-100 btn btn-lg btn-primary" type="submit">
                            <i class="fas fa-user-plus me-2"></i>Register
                        </button>

                        <div class="text-center mt-4">
                            <p class="mb-0">
                                Already have an account? 
                                <a href="{{ route('login') }}" class="fw-semibold text-decoration-none">Sign in here</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
    <style>
        .card {
            border-radius: 1rem;
            background: rgba(255, 255, 255, 0.95);
        }
        
        .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(52, 152, 219, 0.25);
        }
        
        .btn-primary {
            background-color: #3498db;
            border-color: #3498db;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background-color: #2980b9;
            border-color: #2980b9;
            transform: translateY(-1px);
        }
        
        .form-floating:first-child .form-control {
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
        }
        
        .form-floating:last-child .form-control {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
        
        .form-text {
            font-size: 0.85rem;
            color: #6c757d;
        }
    </style>
    @endpush
</x-layout-additional>