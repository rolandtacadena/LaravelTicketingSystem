<nav id="main-nav" class="top-bar" data-topbar>
    <ul class="title-area">
        <li class="name">
            <h1>
                <a href="{{ url('tickets') }}">
                    TMS - Ticket Management System
                </a>
            </h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
    </ul>
    <section class="top-bar-section">
        <ul class="right">
            <li class="divider"></li>
            @if (Auth::guest())
                <li><a href="{{ url('/auth/register') }}">Register</a></li>
                <li class="divider"></li>
                <li><a href="{{ url('/auth/login') }}">Login</a></li>
                <li class="divider"></li>
            @else
                <li class="user-role">
                    <a href="{{ url('/admin') }}">
                        @if(Auth::user()->is_admin())
                            {{ ucwords(Auth::user()->role) }}
                        @endif
                    </a></li>
                <li class="divider"></li>
                <li class="has-dropdown">
                    <a href="">{{ Auth::user()->name }}</a>
                    <ul class="dropdown">
                        <li><a href="{{ url('/user/profile') }}">Profile</a></li>
                        <li><a href="{{ url('/user/settings/') }}">Settings</a></li>
                        <li class="divider"></li>
                    </ul>
                </li>
                <li class="divider"></li>
                <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                <li class="divider"></li>
            @endif
        </ul>
    </section>
</nav>