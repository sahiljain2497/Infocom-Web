<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            TANISHKA INFOCOM
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ Request::segment(2) == '' ? 'active' : '' }}"><a class="nav-link" href="/admin/"><i class="fas fa-home"></i> Home</a></li>
                <li class="nav-item {{ Request::segment(2) == 'users' ? 'active' : '' }}"><a class="nav-link" href="/admin/users"><i class="fas fa-users"></i> Users</a></li>
                <li class="nav-item {{ Request::segment(2) == 'attendance' ? 'active' : '' }}"><a class="nav-link" href="/admin/attendance"><i class="fas fa-clipboard-list"></i> Attendance</a></li>
                <li class="nav-item {{ Request::segment(2) == 'circle' ? 'active' : '' }}"><a class="nav-link" href="/admin/circle"><i class="fas fa-map-marker-alt"></i> Circle</a></li>
            </ul>
                    <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a class="user-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                           <i class="fas fa-sign-out-alt"></i>  {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
