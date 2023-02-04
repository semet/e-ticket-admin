<div class="row">
    <div class="col-lg-6">
       <div class="blog-image rounded">
            <a href="#" style="background-image: url({{ asset('assets/images/trending/trending5.jpg') }});"></a>
        </div>
    </div>
    <div class="col-lg-6">
        <h4 class="text-center border-b pb-2">Register</h4>
        <div class="log-reg-button d-flex align-items-center justify-content-between">
            <button type="submit" class="btn btn-fb">
                <i class="fab fa-facebook"></i> Login with Facebook
            </button>
            <button type="submit" class="btn btn-google">
                <i class="fab fa-google"></i> Login with Google
            </button>
        </div>
        <hr class="log-reg-hr position-relative my-4 overflow-visible">
        <form method="post" action="#" name="contactform1" id="contactform1">
            <div class="form-group mb-2">
                <input type="text" name="user_name" class="form-control" id="fname1" placeholder="User Name">
            </div>
            <div class="form-group mb-2">
                <input type="text" name="user_name" class="form-control" id="femail" placeholder="Email Address">
            </div>
            <div class="form-group mb-2">
                <input type="password" name="password_name" class="form-control" id="lpass1" placeholder="Password">
            </div>
            <div class="form-group mb-2">
                <input type="password" name="password_name" class="form-control" id="lrepass" placeholder="Re-enter Password">
            </div>
            <div class="form-group mb-2 d-flex">
                <input type="checkbox" class="custom-control-input" id="exampleCheck1">
                <label class="custom-control-label mb-0 ms-1 lh-1" for="exampleCheck1">I have read and accept the Terms and Privacy Policy?</label>
            </div>
            <div class="comment-btn mb-2 pb-2 text-center border-b">
                <input type="submit" class="nir-btn w-100" id="submit1" value="Register">
            </div>
            <p class="text-center">Already have an account? <a href="#" class="theme">Login</a></p>
        </form>
    </div>
</div>
