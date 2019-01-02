<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="/">Tanishka Infocom Services</a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item {{ Request::segment(2) == 'home' ? 'active' : '' }}">
                <a class="nav-link" href="/coordinator/home"><i class="fas fa-home"></i> Home<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {{ Request::segment(2) == 'user' ? 'active' : '' }}">
                <a class="nav-link" href="/coordinator/user"><i class="fas fa-user"></i> Profile</a>
            </li>
            <li class="nav-item {{ Request::segment(2) == 'attendance' ? 'active' : '' }}">
                <a class="nav-link" href="/coordinator/attendance"><i class="fas fa-clipboard-list"></i> Attendance</a>
            </li>
            <li class="nav-item {{ Request::segment(2) == 'dpr' ? 'active' : '' }}">
                <a class="nav-link" href="/coordinator/dpr">DPR</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</nav>
