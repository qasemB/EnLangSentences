<nav class="navbar bg_blue">
    {{-- {{dd(request()->route()->uri())}} --}}
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="/images/logo.png" alt="Bootstrap" width="30" height="24"
                style="filter: drop-shadow(0 0 2px blue)">
        </a>
        <livewire:offline-status/>

        <div class="rounded-circle border d-flex p-0 justify-content-center align-items-center navbar-toggler pointer"
            style="width:35px;height:35px" alt="Avatar" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
            aria-controls="offcanvasNavbar">
            @if (Auth::check())
                @if (Auth::user()->avatar)
                    <img src="{{ Auth::user()->avatar }}" class="w-100">
                @else
                    <i class="fa-solid fa-user text-white"></i>
                @endif
            @else
                <i class="fa-solid fa-bars text-white"></i>
            @endif
        </div>
        {{--        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"> --}}
        {{--            <span class="navbar-toggler-icon"></span> --}}
        {{--        </button> --}}
        <div class="min_w_100 offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
            aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header ">
                @if (Auth::check())
                    <div class="rounded-circle border d-flex p-0 justify-content-center align-items-center"
                        style="width:55px;height:55px" alt="Avatar">
                        <img src="/images/avatar.png" class="w-100">
                    </div>
                @endif
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body" id="main_menu">
                <ul class="navbar-nav justify-content-end flex-grow-1 mt-4 pe-3">
                    <li class="nav-item">
                        <a class="nav-link text-center {{ request()->route()->uri() == '/'? 'active': '' }}"
                            aria-current="page" href="/">Home</a>
                    </li>
                    @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link text-center {{ request()->route()->uri() == 'settings'? 'active': '' }}"
                                href="#">Settings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-center {{ request()->route()->uri() == 'progress'? 'active': '' }}"
                                href="#">Progress</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-center" href="/logout">Logout</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-center {{ request()->route()->uri() == 'login'? 'active': '' }}"
                                href="/login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-center {{ request()->route()->uri() == 'register'? 'active': '' }}"
                                href="/register">Register</a>
                        </li>
                    @endif

                    <hr class="border">

                    @if (Auth::check())
                        <livewire:menu-scores />
                    @endif

                </ul>
                {{--                <form class="d-flex mt-3" role="search"> --}}
                {{--                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> --}}
                {{--                    <button class="btn btn-outline-success" type="submit">Search</button> --}}
                {{--                </form> --}}
            </div>
        </div>
    </div>
</nav>
