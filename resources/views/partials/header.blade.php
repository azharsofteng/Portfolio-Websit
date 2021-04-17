<header class="app-header">
    <a class="app-header__logo" href="{{route('dashboard')}}">Admin Panel</a>
    <!-- Sidebar toggle button-->
    <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">
        <!-- User Menu-->
        <li class="dropdown">
            <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i> {{Auth::user()->user_name}}</a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li>
                    <button class="dropdown-item" data-toggle="modal" data-target="#passwordChange"><i class="fa fa-cog fa-lg"></i> Settings</button>
                </li>
                <li>
                    <a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{route('logout')}}"><i class="fa fa-sign-out fa-lg"></i> Logout</a>
                </li>
            </ul>
        </li>
    </ul>
</header>