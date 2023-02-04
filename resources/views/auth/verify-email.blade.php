<x-layouts.main>
    <x-slot:title>
        Verifikasi Email
    </x-slot:title>
    <section class="login-register pt-6 pb-6">
        <div class="container">
            <div class="log-main blog-full log-reg w-75 mx-auto">
                <div class="row">
                    <div class="col-lg-6 mx-auto">
                        <h3 class="text-center border-b pb-2">Verifikasi Email</h3>
                        @if(session()->has('error'))
                        <div class="alert alert-danger p-4" role="alert">
                            {{ session()->get('error') }}
                        </div>
                        @endif
                        <form method="post" action="{{ route('register.verify') }}">
                            @csrf
                            <div class="form-group mb-2">
                                <input type="number" name="code" class="form-control @error('code') is-invalid @enderror" id="code" placeholder="Kode verifikasi">
                                @error('code')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="comment-btn mb-2 pb-2 text-center border-b">
                                <button class="nir-btn" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
</x-layouts.main>
