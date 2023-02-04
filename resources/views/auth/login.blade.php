<x-layouts.main>
    <x-slot:title>
        Registerasi
    </x-slot:title>
    <section class="login-register pt-6 pb-6">
        <div class="container">
            <div class="log-main blog-full log-reg w-75 mx-auto">
                <div class="row">
                    <div class="col-lg-6 mx-auto">
                        <h3 class="text-center border-b pb-2">Login</h3>
                        @if(session()->has('emailReminder'))
                        <div class="alert alert-warning p-4" role="alert">
                            {{ session()->get('emailReminder') }} <br/>
                            Atau jika anda tidak menerima Email verifikasi <br/>
                            <a href="{{ route('register.resend.verification') }}">kirim</a> ulang sekarang
                        </div>
                        @endif
                        @if(session()->has('success'))
                        <div class="alert alert-success p-4" role="alert">
                            {{ session()->get('success') }}
                        </div>
                        @endif
                        <form method="post" action="{{ route('register.post') }}" id="registerForm">
                            @csrf
                            <div class="form-group mb-2">
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="email@example.com">
                                @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password">
                                @error('password')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="comment-btn mb-2 pb-2 text-center border-b">
                                <button class="nir-btn" type="submit">Registetr</button>
                            </div>
                            <p class="text-center">belum ada akun? <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal" class="theme">Login</a></p>
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
