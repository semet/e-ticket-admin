<x-layouts.main>
    <x-slot:title>
        Registerasi
    </x-slot:title>
    <section class="login-register pt-6 pb-6">
        <div class="container">
            <div class="log-main blog-full log-reg w-75 mx-auto">
                <div class="row">
                    <div class="col-lg-6 mx-auto">
                        <h3 class="text-center border-b pb-2">Register</h3>

                        <form method="post" action="{{ route('register.post') }}" id="registerForm">
                            @csrf
                            <div class="form-group mb-2">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="1" placeholder="Nama Lengkap">
                                @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username">
                                @error('username')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="email@example.com">
                                @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" placeholder="Phone number">
                                @error('phone_number')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password">
                                @error('password')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" placeholder="Retype Password">
                                @error('password_confirmation')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- <div class="form-group mb-2 d-flex">
                                <input type="checkbox" class="custom-control-input" id="exampleCheck">
                                <label class="custom-control-label mb-0 ms-1 lh-1" for="exampleCheck">I have read and accept the Terms and Privacy Policy?</label>
                            </div> --}}
                            <div class="comment-btn mb-2 pb-2 text-center border-b">
                                <button class="nir-btn" type="submit">Register</button>
                            </div>
                            <p class="text-center">Already have an account? <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal" class="theme">Login</a></p>
                        </form>
                        <hr class="log-reg-hr position-relative my-4 overflow-visible">
                        <div class="log-reg-button d-sm-flex align-items-center justify-content-between">
                            <a href="{{ route('login.facebook.redirect') }}" class="btn btn-fb w-50 me-1">
                                <i class="fab fa-facebook"></i> Login with Facebook
                            </a>
                            <a href="{{ route('login.google.redirect') }}" class="btn btn-google w-50 ms-1">
                                <i class="fab fa-google"></i> Login with Google
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</x-layouts.main>
