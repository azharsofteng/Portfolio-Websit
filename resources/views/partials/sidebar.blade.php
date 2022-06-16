<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <img style="height: 50px; width:50px;" class="app-sidebar__user-avatar" src="{{ asset(Auth::user()->image) }}" alt="User Image" />
        <div>
            <p class="app-sidebar__user-name">{{ Auth::user()->name }}</p>
            <p class="app-sidebar__user-designation">{{ Auth::user()->user_name }}</p>
        </div>
    </div>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-cog"></i><span class="app-menu__label">Adminastator</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="{{ route('about.edit') }}"><i class="icon fa fa-circle-o"></i> Update About</a>
                </li>
                <li>
                    <a class="treeview-item" href="{{ route('profile') }}" rel="noopener"><i class="icon fa fa-circle-o"></i> Update Profile</a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Components</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="{{ route('service.index') }}"><i class="icon fa fa-circle-o"></i> Add Service </a>
                </li>
                <li>
                    <a class="treeview-item" href="{{ route('category.index') }}"><i class="icon fa fa-circle-o"></i> Add Category</a>
                </li>
                <li>
                    <a class="treeview-item" href="{{ route('portfolio.create') }}"><i class="icon fa fa-circle-o"></i> Add Portfolio </a>
                </li>
                <li>
                    <a class="treeview-item" href="{{ route('resume.create') }}"><i class="icon fa fa-circle-o"></i> Add Resume </a>
                </li>
                <li>
                    <a class="treeview-item" href="{{ route('blog.create') }}"><i class="icon fa fa-circle-o"></i> Add Blog Post </a>
                </li>
                <li>
                    <a class="treeview-item" href="{{ route('patner.index') }}"><i class="icon fa fa-circle-o"></i> Add Partner </a>
                </li>
            </ul>
        </li>
        <li>
            <a class="app-menu__item {{ Request::is('contact') ? 'active' : '' }}" href="{{ route('contact.index') }}"><i class="app-menu__icon fa fa-envelope"></i><span class="app-menu__label">All Contact</span></a>
        </li>
        <li>
            <a class="app-menu__item" href="{{ route('logout') }}"><i class="app-menu__icon fa fa-power-off"></i><span class="app-menu__label">LogOut</span></a>
        </li>
    </ul>
</aside>