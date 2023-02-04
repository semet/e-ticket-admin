<div class="row">
    <div class="w-100">
        <h4 class="text-center border-b pb-2">Login</h4>
        <div class="log-reg-button d-flex align-items-center justify-content-between">
            <a href="{{ route('login.facebook.redirect') }}" class="btn btn-fb">
                <i class="fab fa-facebook"></i> Facebook
            </a>
            <a href="{{ route('login.google.redirect') }}" class="btn btn-google">
                <i class="fab fa-google"></i> Google
            </a>
        </div>

        <hr class="log-reg-hr position-relative my-4 overflow-visible">
        <form method="post" action="#" name="loginForm" id="loginForm">
            <div class="form-group mb-2">
                <input type="email" name="email" class="form-control" id="email" placeholder="Email Address">
            </div>
            <div class="form-group mb-2">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            </div>
            <div class="form-group mb-2">
                <input type="checkbox" class="custom-control-input" id="exampleCheck">
                <label class="custom-control-label mb-0" for="exampleCheck1">Remember me</label>
                <a class="float-end" href="#">Lost your password?</a>
            </div>
            <div class="comment-btn mb-2 pb-2 text-center border-b">
                <input type="submit" class="nir-btn w-100" id="submit" value="Login">
            </div>
            <p class="text-center">Don't have an account? <a href="{{ route('register.show') }}" class="theme">Register</a></p>
        </form>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#loginForm').submit(function (e) {
                e.preventDefault()
                var email =  $('#email');
                var password = $('#password')
                axios.post('{{ route('login') }}', {
                    _token: '{{ csrf_token() }}',
                    email: email.val(),
                    password: password.val()
                })
                .then(function (response) {
                    if(response.status === 200) {
                        location.reload();
                    }
                })
                .catch(function(err) {
                    $.toast({
                        heading: 'Error',
                        text: 'Unable to login. Try again',
                        position: 'top-center',
                        stack: false,
                        icon: 'error'
                    })

                })
            })
        });
    </script>
@endpush
