<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <img style="height: 50px; width:50px;" class="app-sidebar__user-avatar" src="{{ asset('default.png') }}" alt="User Image" />
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
                    <a class="treeview-item" href=""><i class="icon fa fa-circle-o"></i> Update About</a>
                </li>
                <li>
                    <a class="treeview-item" href="https://fontawesome.com/v4.7.0/icons/" target="_blank" rel="noopener"><i class="icon fa fa-circle-o"></i> Font Icons</a>
                </li>
                <li>
                    <a class="treeview-item" href="ui-cards.html"><i class="icon fa fa-circle-o"></i> Cards</a>
                </li>
                <li>
                    <a class="treeview-item" href="widgets.html"><i class="icon fa fa-circle-o"></i> Widgets</a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Components</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="table-basic.html"><i class="icon fa fa-circle-o"></i> Basic Tables</a>
                </li>
                <li>
                    <a class="treeview-item" href="table-data-table.html"><i class="icon fa fa-circle-o"></i> Data Tables</a>
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