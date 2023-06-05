<nav class="navbar navbar-expand-md fixed-top navbar-dark shadow-5-strong">
    <div class="container">
        

        <button class="navbar-toggler bg-dark" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link text-dark fw-bold" href="{{ route('signin') }}">SIGN IN</a>
                </li>
                @endif

                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link text-dark fw-bold" href="{{ route('signup') }}">SIGN UP</a>
                </li>
                @endif
                @else
                <li class="nav-item">
                    @if (Auth::guard('teacher')->check())
                    <a class="nav-link text-dark" href="{{ route('homepage') }}">Dashboard</a>
                    @else
                    <a class="nav-link text-dark" href="{{ route('student.home') }}">Student Dashboard</a>
                    @endif
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link text-dark dropdown-toggle fw-bold" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        @if (Auth::guard('teacher')->check())
                        {{ Auth::user()->name }}
                        @else
                        {{ Auth::guard('student')->user()->name }}
                        @endif
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        @if (Auth::guard('teacher')->check())
                        <a class="dropdown-item " href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        @else
                        <a class="dropdown-item " href="{{ route('student.signout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        @endif
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
