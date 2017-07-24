<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('admin_assets/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                @if(Sentinel::check())
                <p>{{ Sentinel::getUser()->first_name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                @else
                    Auth
                @endif
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="active treeview">
                <a href="{{url('/admin')}}">
                    <i class="fa fa-home"></i> <span>Dashboard</span>
                </a>
            </li>
             <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Settings</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="{{url('admin/location/show')}}"><i class="fa fa-circle-o"></i>Location</a></li>
                    <li><a href="{{url('admin/sector/show')}}"><i class="fa fa-circle-o"></i>Industry</a></li>
                    <li><a href="{{url('admin/status/show')}}"><i class="fa fa-circle-o"></i>Status of Start-ups</a></li>
                    <li><a href="{{url('admin/capital/show')}}"><i class="fa fa-circle-o"></i>Type of Capital</a></li>
                    <li><a href="{{url('admin/invest/show')}}"><i class="fa fa-circle-o"></i>Interests of Angels</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>iFund members</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>

            </span>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="{{url('admin/users/show')}}"><i class="fa fa-circle-o"></i>Startups</a></li>
                    <li><a href="{{url('admin/users/show-angel')}}"><i class="fa fa-circle-o"></i>Angels</a></li>
                </ul>
            </li>
            <li class="active treeview">
                <a href="{{url('admin/projects/show')}}">
                    <i class="fa fa-file"></i> <span>Proposals</span>
                </a>
            </li>
            <li class="active treeview">
                <a href="{{url('admin/investment/show')}}">
                    <i class="fa fa-file"></i> <span>Interests Submitted</span>
                </a>
            </li>
            
            <li class="active treeview">
                <a href="{{url('admin/event/show')}}">
                    <i class="fa fa-envelope"></i> <span>Events</span>
                </a>
            </li>
            <li class="active treeview">
                <a href="{{url('admin/article/show')}}">
                    <i class="fa fa-archive"></i> <span>Articles</span>
                </a>
            </li>
            <li class="active treeview">
                <a href="{{url('admin/partners/show')}}">
                    <i class="fa fa-paragraph"></i> <span>Partners</span>
                </a>
            </li>
           
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>