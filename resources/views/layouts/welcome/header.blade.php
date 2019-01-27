<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">
            Tanishka Infocom 
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link {{Request::segment(1) == '' ? 'selected' : ''}}" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Request::segment(1) == 'services' ? 'selected' : ''}}" href="/services">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Request::segment(1) == 'about' ? 'selected' : ''}}" href="/about">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Request::segment(1) == 'contact' ? 'selected' : ''}}" href="/contact">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Request::segment(1) == 'login' ? 'selected' : ''}}" href="/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Request::segment(1) == 'register' ? 'selected' : ''}}" href="/register">Signup</a>
                </li>
            </ul>
        </div>
    </div>
</nav>