<header class="main-header">
            <!-- header-top -->
            <div class="header-top">
                <div class="top-inner clearfix">
                    <div class="left-column pull-left">
                        <p><b>Welcome </b> {{ auth()->user()->username }}</p>
                    </div>
                    <div class="right-column pull-right">

                        <div class="sign-box">
                           @auth
                            <a href="{{ route('member.logout') }}"><i class="fas fa-user"></i>Sign Out</a>

                           @endauth
                        </div>
                    </div>
                </div>
            </div>
            <!-- header-lower -->
            <div class="header-lower">
                <div class="outer-box">
                    <div class="main-box">
                        <div class="logo-box">
                            <figure class="logo w-25" ><a href="{{route('member.dashboard')}}"><img
                                        width="50" class=""
                                                                                             src="{{
                            asset('')
                            }}logo.png"  alt=""></a></figure>
                        </div>
                        <div class="menu-area clearfix">
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler">
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                            </div>
                            <nav class="main-menu navbar-expand-md navbar-light">
                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                    <ul class="navigation clearfix">
                                        <li><a href="{{route('member.profile.view')}}"><span>Profile</span></a>
                                        </li>
                                        <li class="dropdown"><a href="!#"><span>Activities</span></a>
                                            <ul>
                                                <li><a href="{{route('member.active.assignment')}}">Assignments</a></li>
                                                <li><a href="{{route('member.notice.view')}}">Notifications</a></li>
                                            </ul>
                                        </li>

                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>

                    </div>
                </div>
            </div>
        </header>
