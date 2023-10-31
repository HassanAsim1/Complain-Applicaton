<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="../../../html/ltr/vertical-menu-template/index.html"><span class="brand-logo">
                <img src="{{asset('img/ticketportal3.png')}}" alt=""></span>
                        <h3 class="brand-text" style="font-size: 15px;">Technical Support</h3>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item"><a class="d-flex align-items-center" href="{{url('admin/complain')}}"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Dashboards</span></a>
                <li class="{{ request()->is('admin/add-complain*') || request()->is('admin/view-complain*') ? 'active' : '' }} nav-item">
                    <a class="d-flex align-items-center" href="{{ url('admin/complain') }}">
                        <i data-feather="grid"></i>
                        <span class="menu-title text-truncate" data-i18n="Datatable">Tickets</span>
                    </a>
                    <ul class="menu-content">
                        @if(auth()->user()->role != 'developer' && auth()->user()->role != 'client')
                        <li class="{{ request()->is('admin/add-complain*') ? 'active' : '' }}">
                            <a class="d-flex align-items-center" href="{{ url('admin/add-complain') }}">
                                <i data-feather="circle"></i>
                                <span class="menu-item text-truncate" data-i18n="Basic">Add Tickets</span>
                            </a>
                        </li>
                        @endif
                        @if(auth()->user()->role == 'client')
                        <li class="{{ request()->is('client/add-complain*') ? 'active' : '' }}">
                            <a class="d-flex align-items-center" href="{{ url('client/add-client-complain') }}">
                                <i data-feather="circle"></i>
                                <span class="menu-item text-truncate" data-i18n="Basic">Add Tickets</span>
                            </a>
                        </li>
                        @endif
                        <li class="{{ request()->is('admin/view-complain*') ? 'active' : '' }}">
                            <a class="d-flex align-items-center" href="{{ url('admin/view-complain') }}">
                                <i data-feather="circle"></i>
                                <span class="menu-item text-truncate" data-i18n="Advanced">View Tickets</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @if(auth()->user()->role == 'admin')
                <li class="{{ request()->is('admin/view-user*') || request()->is('admin/view-user*') ? 'active' : '' }} nav-item">
                    <a class="d-flex align-items-center" href="{{ url('admin/complain') }}">
                        <i data-feather="grid"></i>
                        <span class="menu-title text-truncate" data-i18n="Datatable">Register</span>
                    </a>
                    <ul class="menu-content">
                        <li class="{{ request()->is('admin/add-user*') ? 'active' : '' }}">
                            <a class="d-flex align-items-center" href="{{ url('admin/add-user') }}">
                                <i data-feather="circle"></i>
                                <span class="menu-item text-truncate" data-i18n="Basic">Add User</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('admin/view-user*') ? 'active' : '' }}">
                            <a class="d-flex align-items-center" href="{{ url('admin/view-user') }}">
                                <i data-feather="circle"></i>
                                <span class="menu-item text-truncate" data-i18n="Basic">View User</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
            
        </div>
    </div>