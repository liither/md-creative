<x-layout-additional>
    <x-slot:title>Login</x-slot:title>

    <!-- White-themed login page with logo -->
    <div class="login-page bg-white">
        <div class="container py-5">
            <!-- Login Card -->
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm rounded-lg">
                        <div class="card-body p-4 p-md-5">
                            <!-- Page Title -->
                            <div class="text-center mb-4">
                                <h2 class="fw-bold mb-3">Please login</h2>
                                <p class="text-muted">Sign in to access your account</p>
                            </div>

                            <!-- Session Messages -->
                            @if(session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif

                            @if(session()->has('loginError'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('loginError') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif

                            <!-- Login Form -->
                            <form action="/login" method="post">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                                        id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
                                    <label for="email">Email address</label>
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-floating mb-4">
                                    <input type="password" name="password" class="form-control" 
                                        id="password" placeholder="Password" required>
                                    <label for="password">Password</label>
                                </div>

                                <div class="d-grid mb-3">
                                    <button class="btn btn-primary py-2" type="submit">
                                        Login
                                    </button>
                                </div>

                                <div class="text-center mt-4">
                                    <small class="d-block text-muted">
                                        Not Registered? <a href="/register">Register Now!</a>
                                    </small>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
    <style>
        .login-page {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .card {
            border-radius: 12px;
            overflow: hidden;
        }
        
        .form-control:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
        }
        
        .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background-color: #0b5ed7;
            border-color: #0a58ca;
        }
        
        .form-floating label {
            color: #6c757d;
        }
        
        .form-floating>.form-control:focus~label,
        .form-floating>.form-control:not(:placeholder-shown)~label,
        .form-floating>.form-select~label {
            color: #0d6efd;
        }
    </style>
    @endpush
</x-layout-additional>