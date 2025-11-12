<div class="container-fluid bg-dark px-0">
    <div class="row gx-0">
        <div class="col-lg-12">
            <div class="flex bg-white items-center justify-between  px-4">
                <div class="flex items-center justify-between  px-4">
                    <div class=" d-inline-flex align-items-center py-2 me-4">
                        <a href="{{ route('home') }}" class="font-lobster sm:text-2xl"><img class="w-20"
                                src="{{ asset('img/logo.jpg') }}" alt=""></a>
                    </div>
                    <div class="h-100 d-inline-flex align-items-center py-2">
                        <p class="text-3xl text-primary me-2 font-lobster font-bold ">Hotel</p>
                    </div>
                </div>
                <div class="flex gap-4 items-center justify-between  px-4">
                    <div class="flex items-center">
                        <i class="fa fa-phone-alt text-primary me-2"></i>
                        <p class="mb-0 font-lobster ">+1514 345 6789</p>
                    </div>
                    <div class="flex flex-col gap-4 items-center lg:flex-row">
                        @guest()
                            <a href="{{ route('login') }}" class="nav-link flex items-center gap-2  bg-primary text-white py-2 px-4 rounded-sm"><i
                                class="fa-solid fa-user"></i>Sign In</a>
                        @else
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                    {{ Auth::user()->name }}</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="{{ route('orders.index') }}" class="dropdown-item">My Bookings</a>
                                    <a href="{{ route('profile') }}" class="dropdown-item">My Profile</a>
                                    <form method="post" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="btn btn-link dropdown-item">Logout</button>
                                    </form>
                                </div>
                            </div>
                            @if (Auth::user()->is_admin)
                                <a href="{{ route('admin.index') }}" class="nav-item nav-link">Admin Page</a>
                            @endif
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
