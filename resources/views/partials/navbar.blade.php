<nav class="navbar navbar-expand-lg fixed-top scrolling-navbar indigo">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <span class="icon-menu"></span>
                <span class="icon-menu"></span>
                <span class="icon-menu"></span>
            </button>
            <a href="{{ route('home') }}" class="navbar-brand"><img style="height: 70px;" src="{{ asset('img/logo2.png') }}" alt="" /></a>
        </div>
        <div class="collapse navbar-collapse" id="main-navbar">
            <ul class="onepage-nev navbar-nav mr-auto w-100 justify-content-end clearfix">
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('home') }}">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}#about">
                        About
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}#services">
                        Services
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}#resume">
                        Resume
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}#portfolios">
                        Work
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('blogs') }}">
                        Blog
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}#contact">
                        Contact
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Mobile Menu Start -->
    <ul class="onepage-nev mobile-menu">
        <li>
            <a href="{{ route('home') }}#home">Home</a>
        </li>
        <li>
            <a href="{{ route('home') }}#about">about</a>
        </li>
        <li>
            <a href="{{ route('home') }}#services">Services</a>
        </li>
        <li>
            <a href="{{ route('home') }}#resume">resume</a>
        </li>
        <li>
            <a href="{{ route('home') }}#portfolio">Work</a>
        </li>
        <li>
            <a href="{{ route('blogs') }}">Blog</a>
        </li>
        <li>
            <a href="{{ route('home') }}#contact">Contact</a>
        </li>
    </ul>
    <!-- Mobile Menu End -->
</nav>