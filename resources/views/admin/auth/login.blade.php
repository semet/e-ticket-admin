<x-layouts.auth>
    @if(session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <form action="{{ route('admin.login.post') }}" method="post">
        @csrf
        <div class="p-4">
            <div class="input-group mb-3">
                <span class="input-group-text bg-primary">
                    <i class="bi bi-person-plus-fill text-white"></i>
                </span>
                <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Username" name="email">
                @error('email')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text bg-primary">
                    <i class="bi bi-key-fill text-white"></i>
                </span>
                <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="password" name="password">
                @error('passwword')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Remember Me
                </label>
            </div>
            <button class="btn btn-primary text-center mt-2" type="submit">
                Login
            </button>
            <p class="text-center text-primary">Forgot your password?</p>
        </div>
    </form>
</x-layouts.auth>
