<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">
            <img src="{{ asset(auth()->user()->photo) }}" alt="user-img" title="{{auth()->user()->name}}"
                class="rounded-circle avatar-md">
            <div class="dropdown">
                <a href="{{route('admin.dashboard')}}" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                    data-bs-toggle="dropdown">{{ Str::ucfirst(auth()->user()->name) }}</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="{{ route('admin.show') }}" class="dropdown-item notify-item">
                        <i class="fe-user me-1"></i>
                        <span>My Profile</span>
                    </a>

                    <!-- item-->
                    <a href="{{route('admin.setting')}}" class="dropdown-item notify-item">
                        <i class="fe-settings me-1"></i>
                        <span>Settings</span>
                    </a>


                    <!-- item-->
                    <a href="{{ route('admin.logout') }}" class="dropdown-item notify-item">
                        <i class="fe-log-out me-1"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>
            <p class="text-muted">ADMIN</p>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">


                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> Dashboards </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.show') }}">
                        <i class="mdi mdi-calendar"></i>
                        <span> Profile </span>
                    </a>
                </li>


                <li>
                    <a href="#sidebarEcommerce" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span> Management </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEcommerce">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('admin.member.create')}}">Add new member</a>
                            </li>
                            <li>
                                <a href="{{route('admin.member.all')}}">All Memebers</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarCrm" data-bs-toggle="collapse">
                        <i class="mdi mdi-account-multiple-outline"></i>
                        <span> Assignments </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarCrm">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('admin.task.create')}}">Create</a>
                            </li>
                            <li>
                                <a href="crm-contacts.html">Assign</a>
                            </li>
                            <li>
                                <a href="crm-opportunities.html">view</a>
                            </li>
                            <li>
                                <a href="crm-leads.html">Leads</a>
                            </li>
                            <li>
                                <a href="crm-customers.html">Customers</a>
                            </li>
                        </ul>
                    </div>
                </li>


            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
