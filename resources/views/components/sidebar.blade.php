<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ url('/images/admin-lte/avatar.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- Sidebar user panel -->


        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

            {{--admin menu--}}
            @if(Auth::user()->type == 'admin' || Auth::user()->type == "reseller")




                <li @if(Request::is('home')) class="active" @endif ><a href="{{ url('/home') }}"><i
                                class="fa fa-home"></i>
                        <span>Home</span></a></li>

                <li @if(Request::is('invoice')) class="active" @endif ><a href="{{ url('/invoice') }}"><i
                                class="fa fa-files-o"></i>
                        <span>Invoice</span></a></li>




                <li @if(Request::is('user/add')) class="active" @endif ><a href="{{ url('/user/add') }}"><i
                                class="fa fa-user-plus"></i>
                        <span>Create User</span></a></li>

                <li @if(Request::is('user/list')) class="active" @endif ><a href="{{ url('/user/list') }}"><i
                                class="fa fa-users"></i>
                        <span>Users</span></a></li>

                <li class="treeview @if(Request::is('balance/add') || Request::is('balance/update')) active @endif">
                    <a href="#">
                        <i class="fa fa-money"></i>
                        <span>Balance</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>

                    <ul class="treeview-menu @if(Request::is('balance/add') || Request::is('balance/update')) menu-open @endif"
                        style="display: @if(Request::is('balance/add') || Request::is('balance/update')) block @else none @endif">

                        <li @if(Request::is('balance/add')) class="active" @endif><a href="{{ url('/balance/add') }}">
                                <span> Add / Update Balance</span></a></li>


                    </ul>
                </li>

                <li class="treeview @if(Request::is('report/agent') || Request::is('report/invoice')) active @endif">
                    <a href="#">
                        <i class="fa fa-pie-chart"></i>
                        <span>Reports</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>

                    <ul class="treeview-menu @if(Request::is('report/agent') || Request::is('report/invoice')) menu-open @endif"
                        style="display: @if(Request::is('report/agent') || Request::is('report/invoice')) block @else none @endif">

                        <li @if(Request::is('report/agent')) class="active" @endif><a href="{{ url('/report/agent') }}"><i
                                        class="fa fa-pie-chart"></i>
                                <span> Agent Account Report</span></a></li>

                        <li @if(Request::is('report/invoice')) class="active" @endif><a
                                    href="{{ url('/report/invoice') }}"><i
                                        class="fa fa-file"></i>
                                <span> Invoice</span></a></li>


                    </ul>
                </li>
            @endif


            @if(Auth::user()->type == "agent")
                <li @if(Request::is('order')) class="active" @endif ><a href="{{ url('/order') }}"><i
                                class="fa fa-send-o"></i>
                        <span>Order</span></a></li>


                <li @if(Request::is('customers')) class="active" @endif ><a href="{{ url('/customers') }}"><i
                                class="fa fa-users"></i>
                        <span>Customers</span></a></li>

                <li @if(Request::is('invoice')) class="active" @endif ><a href="{{ url('/invoice') }}"><i
                                class="fa fa-pie-chart"></i>
                        <span>Invoice</span></a></li>
            @endif


            @if(Auth::user()->type == "admin")
                <li @if(Request::is('settings')) class="active" @endif ><a href="{{ url('/settings') }}"><i
                                class="fa fa-gears"></i>
                        <span>Settings</span></a></li>

            @endif

            <li @if(Request::is('profile')) class="active" @endif ><a href="{{ url('/profile') }}"><i
                            class="fa fa-user"></i>
                    <span>Profile</span></a></li>


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
