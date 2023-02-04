<nav class="sidebar">
    <div class="sidebar-header">
        <a href="../index.html" class="sidebar-brand">
            <img src="{{ asset('assets/images/logo/no_bg.png') }}" width="120px" alt="logo" />
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item {{ Route::current()->getName() === 'admin.home' ? 'active' : ''  }}">
                <a href="{{ route('admin.home') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>

            <li class="nav-item {{ Route::current()->getName() === 'admin.destinations' ? 'active' : ''  }}">
                <a href="{{ route('admin.destinations') }}" class="nav-link">
                    <i class="link-icon" data-feather="map"></i>
                    <span class="link-title">Destinasi</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#events" role="button" aria-expanded="false" aria-controls="events">
                    <i class="link-icon" data-feather="image"></i>
                    <span class="link-title">Gallery</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="events">
                    <ul class="nav sub-menu">
                        @foreach ($destinations as $destination )
                        <li class="nav-item">
                            <a href="{{ route('admin.destination.images', $destination->id) }}" class="nav-link">{{ $destination->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </li>

            <li class="nav-item {{ Route::current()->getName() === 'admin.bookings' ? 'active' : ''  }}">
                <a href="{{  route('admin.bookings') }}" class="nav-link">
                    <i class="link-icon" data-feather="briefcase"></i>
                    <span class="link-title">Bookings</span>
                </a>
            </li>

            <li class="nav-item {{ Route::current()->getName() === 'admin.users' ? 'active' : ''  }}">
                <a href="{{  route('admin.users') }}" class="nav-link">
                    <i class="link-icon" data-feather="user"></i>
                    <span class="link-title">Users</span>
                </a>
            </li>

            <li class="nav-item {{ Route::current()->getName() === 'admin.passengers' ? 'active' : ''  }}">
                <a href="{{  route('admin.passengers') }}" class="nav-link">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">Penumpang</span>
                </a>
            </li>

        </ul>
    </div>
</nav>
