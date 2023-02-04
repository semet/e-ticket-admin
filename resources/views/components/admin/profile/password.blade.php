<form action="{{ route('admin.password.update') }}" method="post">
    <h3 class="mb-4">Update Password</h3>
    @if(session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
    @endif
    @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    @csrf
    <div class="row">
        <div class="col-md-4">
            <div class="mb-3">
                <label for="oldPassword" class="form-label">Passwword Lama</label>
                <input type="password" class="form-control  @error('oldPassword') is-invalid @enderror" name="oldPassword" id="oldPassword">
                @error('oldPassword')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="newPassword" class="form-label">Passwword Baru</label>
                <input type="password" class="form-control @error('newPassword') is-invalid @enderror" name="newPassword" id="newPassword">
                @error('newPassword')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="newPasswordConfirmation" class="form-label">Ulang Passwword Baru</label>
                <input type="password" class="form-control @error('newPassword_confirmation') is-invalid @enderror" name="newPassword_confirmation" id="newPasswordConfirmation">
                @error('newPassword_confirmation')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button class="btn btn-primary" type="submit">Save</button>
        </div>
    </div>
</form>
