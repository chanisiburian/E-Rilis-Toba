<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="background:#2124b1;">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('') }}">
        <div class="sidebar-brand-text mx-3 d-flex justify-content-center align-items-center"> 
            <img src="{{ asset('static/images/ikon-toba.png') }}" width="40">
            <span class="">E-Rilis Toba</span>
        </div>
    </a>

    <hr class="sidebar-divider my-0">

    <div id="sidebar--menu">
        @if (auth()->user()->level_id == 1)
            <li class="nav-item {{ request()->segment(2) == ''? 'active' : '' }}">
                <a class="nav-link" href="{{ url('') }}/admin">
                    <i class="fas fa-fw fa-box"></i>
                    <span>Berita</span></a>
            </li>
            <li class="nav-item {{ request()->segment(2) == 'user'? 'active' : '' }}">
                <a class="nav-link" href="{{ url('') }}/admin/user">
                    <i class="fas fa-fw fa-dollar-sign"></i>
                    <span>User</span></a>
            </li>
            <li class="nav-item {{ request()->segment(2) == 'profile'? 'active' : '' }}">
                <a class="nav-link" href="{{ url('') }}/admin/profile">
                    <i class="fas fa-user"></i>
                    <span>Profile</span></a>
            </li>
        @else
            <li class="nav-item {{ request()->segment(2) == ''? 'active' : '' }}">
                <a class="nav-link" href="{{ url('') }}/user">
                    <i class="fas fa-fw fa-chart-line"></i>
                    <span>Dashboard</span></a>
            </li>
            @if(Auth::user()->status == 1)
            <li class="nav-item {{ request()->segment(2) == 'berita'? 'active' : '' }}">
                <a class="nav-link" href="{{ url('') }}/user/berita">
                    <i class="fas fa-fw fa-clipboard-list"></i>
                    <span>Berita</span></a>
            </li>
            @endif
            <li class="nav-item {{ request()->segment(2) == 'profile'? 'active' : '' }}">
                <a class="nav-link" href="{{ url('') }}/user/profile">
                    <i class="fas fa-user"></i>
                    <span>Profile</span></a>
            </li>
        @endif
    </div>

</ul>