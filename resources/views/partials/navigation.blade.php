<div id="header-panel" class="header-panel panel-padding--left--right"><!-- Start Header Panel -->
    <div class="wrapper">
        <a class="site-logo" href="{{url('/')}}">
           <h2 style="color:#fff;text-transform: none;">iFund</h2>
        </a>
        <nav id="module-nav" class="module-nav"><!-- Start Main Nav -->
            <div class="module-nav__header visible-xs">
                <button type="button" class="module-nav__toggle" data-toggle="collapse" data-target="#module-nav__wrap">
                    <strong class="sr-only">Toggle navigation</strong>
                    <strong class="icon-bar"></strong>
                    <strong class="icon-bar"></strong>
                    <strong class="icon-bar"></strong>
                </button>
                <a class="module-nav_label" href="#">Menu</a>
            </div>
            <div class="collapse navbar-collapse" id="module-nav__wrap">
                <ul id="module-nav__items" class="module-nav__items clearfix">
                    <li class="current-menu-item"><a href="{{url('/')}}">Home</a></li>
                    <li><a href="{{url('/about-show')}}">About</a></li>
                    <li><a href="{{url('/startup-show')}}">Start-Ups</a></li>
                    <li><a href="{{url('/investor-show')}}">Angels</a></li>
                    <li><a href="{{url('/partners-show')}}">Partners</a></li>
                    @if(Sentinel::check())
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle user-name" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Hello, {{Sentinel::getUser()->first_name}}
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{url('profile-select')}}">
                                            Profile
                                        </a>

                                    </li>
                                    <li>


                                        <a class="user-name" href="#" onclick="document.getElementById('logout-form').submit()">
                                            Logout
                                        </a>
                                        <form action="{{url('logout')}}" method="post" id="logout-form">
                                            {{csrf_field()}}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    @else
                    <li>
                        <a href="{{url('login')}}">login</a>
                    </li>
                    @endif
                </ul>
            </div>
        </nav><!--/ End Main Nav -->
    </div>
</div><!--/ End Header Panel -->