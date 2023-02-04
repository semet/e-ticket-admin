<div class="col-lg-4">
    <div class="sidebar-sticky">
        <div class="list-sidebar">

            <div class="sidebar-item mb-4">
                <ul class="sidebar-category">
                    <li class="{{ Route::current()->getName() == 'user.order' ? 'active': '' }}">
                        <a href="{{  route('user.order') }}">
                            <i class="fas fa-shopping-cart"></i> Order
                        </a>
                    </li>
                    <li class="{{ Route::current()->getName() == 'user.setting' ? 'active': '' }}">
                        <a href="{{ route('user.setting') }}">
                            <i class="fas fa-cog"></i> Pengaturan
                        </a>
                    </li>
                    <li class="{{ Route::current()->getName() == 'user.message' ? 'active': '' }}">
                        <a href="{{ route('user.message') }}">
                            <i class="fas fa-envelope"></i> Pesan
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
