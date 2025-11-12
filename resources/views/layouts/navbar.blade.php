{{-- <nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <a class="navbar-brand " href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
                <div>
                    <li class="nav-item ">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                            href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About As</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Rooms</a>
                    </li>
                </div>
                <div>
                    @guest()
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}"
                                href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('register') ? 'active' : '' }}"
                                href="{{ route('register') }}">Register</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">{{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">My Bookings</a></li>
                                <li><a class="dropdown-item" href="#">My Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form method="post" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="btn btn-link dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </div>
            </ul>
        </div>
    </div>
</nav> --}}
<header id="navbar" class="bg-dark text-white px-10 w-full top-0 left-0 z-50">
    <nav class="container flex items-center justify-center h-16 sm:h-20">
        <div id="nav-menu"
            class="absolute top-0 left-[-100%] w-full min-h-[80vh] bg-dark backdrop-blur-sm flex items-center justify-center duration-300 overflow-hidden lg:static lg:min-h-fit lg:bg-transparent lg:w-auto">
            <ul class="flex flex-col justify-center   items-center lg:flex-row ">
                <li>
                    <a href="{{ route('home') }}" class="nav-link">Home</a>
                </li>
                <li>
                    <a href="{{ route('rooms.index') }}" class="nav-link">Rooms & Suites</a>
                </li>
                <li>
                    <a href="{{ route('rooms.index') }}" class="nav-link">Meetings</a>
                </li>
                <li>
                    <a href="{{ route('restaurant') }}" class="nav-link">Resturant</a>
                </li>

                <li>
                    <a href="{{ route('contact') }}" class="nav-link">Recreation</a>
                </li>
                <li>
                    <a href="{{ route('contact') }}" class="nav-link">Gallery</a>
                </li>
                <li>
                    <a href="{{ route('contact') }}" class="nav-link">Offers</a>
                </li>
                <li>
                    <a href="{{ route('aboutUs') }}" class="nav-link {{ request()->routeIs('aboutUs') ? 'active' : '' }}">About Us</a>
                </li>
                <li>
                    <a href="{{ route('contact') }}" class="nav-link">Contact</a>
                </li>

                {{-- <div class="flex flex-col gap-4 items-center lg:flex-row">
                    @guest()
                        <li>
                            <a href="{{ route('login') }}" class="nav-link">Login</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}" class="nav-link">Register</a>
                        </li>
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
                </div> --}}


            </ul>
        </div>
        <div class="text-xl sm:text-3xl cursor-pointer z-50 lg:hidden">
            <i class="fa-solid fa-bars" id="hamburger"></i>
        </div>

    </nav>
</header>

<script>
    const navMenu = document.getElementById("nav-menu");
    const navLink = document.querySelectorAll(".nav-link");
    const hamburger = document.getElementById("hamburger");

    hamburger.addEventListener("click", () => {
        navMenu.classList.toggle("left-[0]");
        hamburger.classList.toggle("fa-solid-fa-xmark");
    });

    navLink.forEach((link) => {
        link.addEventListener("click", () => {
            navMenu.classList.remove("left-[0]");
            hamburger.classList.toggle("fa-solid-fa-xmark");
        });
    });
</script>
