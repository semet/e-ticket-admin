<header class="main_header_area">
    <div class="header-content py-1 bg-theme">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="links">
                <ul>
                    <li><a href="#" class="white"><i class="icon-calendar white"></i> {{ \Carbon\Carbon::now()->format('d, M Y') }}</a></li>
                    <li><a href="#" class="white"><i class="icon-location-pin white"></i> Lombok NTB</a></li>
                    <li><a href="#" class="white"><i class="icon-clock white"></i> Mon-Fri: 10 AM – 5 PM</a></li>
                </ul>
            </div>
            <div class="links float-right">
                <ul>
                    <li><a href="#" class="white"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#" class="white"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#" class="white"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                    <li><a href="#" class="white"><i class="fab fa-linkedin " aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Navigation Bar -->
    <div class="header_menu" id="header_menu">
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-flex d-flex align-items-center justify-content-between w-100 pb-3 pt-3">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <a class="navbar-brand" href="{{route('home.page')}}">
                            <img src="{{ asset('assets/images/logo/no_bg.png') }}" width="150px" alt="image">
                        </a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="navbar-collapse1 d-flex align-items-center" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav" id="responsive-menu">

                            <li><a href="{{ route('home.page') }}">Home</a></li>

                            <li class="submenu dropdown active">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Destinations <i class="icon-arrow-down" aria-hidden="true"></i></a>
                                <ul class="dropdown-menu">
                                    @foreach ($destinations as $destination)
                                    <li><a href="{{ route('destination', $destination->id) }}">{{ $destination->name }} </a></li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                    <div class="register-login d-flex align-items-center">
                        @guest()
                            <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal" class="me-3">
                                <i class="icon-user"></i> Login/Register
                            </a>
                        @endguest

                        @auth
                            <a href="{{ route('logout') }}" class="me-3">
                                <i class="icon-logout"></i> Logout
                            </a>
                            <a href="{{ route('user.order') }}" class="me-3">
                                <i class="icon-user"></i>
                            </a>
                        @endauth

                    </div>

                    <div id="slicknav-mobile"></div>
                </div>
            </div><!-- /.container-fluid -->
        </nav>
    </div>
    <!-- Navigation Bar Ends -->
</header>
