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
            @if(Auth::user()->type == 'admin')
                <li class="treeview @if(Request::is('admin') || Request::is('user/add') || Request::is('user/list') || Request::is('admin/options')) active @endif">
                    <a href="#">
                        <i class="fa fa-th"></i>
                        <span>{{trans('sidebar.Admin Panel')}}</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>

                    <ul class="treeview-menu @if(Request::is('admin') || Request::is('user/add') || Request::is('user/list') || Request::is('admin/options')) menu-open @endif" style="display: @if(Request::is('admin') || Request::is('user/add') || Request::is('user/list') || Request::is('admin/options')) block @else none @endif">
                        <li @if(Request::is('admin')) class="active" @endif><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>
                                <span>{{trans('sidebar.Admin Dashboard')}}</span></a></li>
                        <li @if(Request::is('user/add')) class="active" @endif><a href="{{ url('/user/add') }}"><i class="fa fa-plus-circle"></i>
                                <span>{{trans('sidebar.Add User')}}</span></a>
                        </li>
                        <li @if(Request::is('user/list')) class="active" @endif><a href="{{ url('/user/list') }}"><i class="fa fa-users"></i>
                                <span>{{trans('sidebar.Users')}}</span></a></li>
                        <li @if(Request::is('admin/options')) class="active" @endif><a href="{{ url('/admin/options') }}"><i class="fa fa-key"></i>
                                <span>{{trans('sidebar.Admin Options')}}</span></a></li>



                    </ul>
                </li>

            @endif

            <li @if(Request::is('home')) class="active" @endif ><a href="{{ url('/home') }}"><i class="fa fa-home"></i>
                    <span>Home</span></a></li>

            <li @if(Request::is('invoice')) class="active" @endif ><a href="{{ url('/invoice') }}"><i class="fa fa-files-o"></i>
                    <span>Invoice</span></a></li>


            <li class="treeview @if(Request::is('make/agent') || Request::is('make/reseller') || Request::is('make/bd/user')) active @endif">
                <a href="#">
                    <i class="fa fa-plus-circle"></i>
                    <span>Create</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu @if(Request::is('make/agent') || Request::is('make/reseller') || Request::is('make/bd/user') || Request::is('admin/options')) menu-open @endif" style="display: @if(Request::is('make/agent') || Request::is('make/reseller') || Request::is('make/bd/user') || Request::is('admin/options')) block @else none @endif">
                    <li @if(Request::is('make/agent')) class="active" @endif><a href="{{ url('/make/agent') }}"><i class="fa fa-user"></i>
                            <span> Make Agent</span></a></li>

                    <li @if(Request::is('make/reseller')) class="active" @endif><a href="{{ url('/make/reseller') }}"><i class="fa fa-user-secret"></i>
                            <span> Make Reseller</span></a></li>

                    <li @if(Request::is('make/bd/user')) class="active" @endif><a href="{{ url('/make/bd/user') }}"><i class="fa fa-user-plus"></i>
                            <span> Make BD User</span></a></li>



                </ul>
            </li>

            <li class="treeview @if(Request::is('user/add') || Request::is('user/list') || Request::is('admin/options')) active @endif">
                <a href="#">
                    <i class="fa fa-edit"></i>
                    <span>Edit</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu @if(Request::is('make/agent') || Request::is('make/reseller') || Request::is('make/bd/user') || Request::is('admin/options')) menu-open @endif" style="display: @if(Request::is('admin') || Request::is('user/add') || Request::is('user/list') || Request::is('admin/options')) block @else none @endif">
                    <li @if(Request::is('make/agent')) class="active" @endif><a href="{{ url('/make/agent') }}"><i class="fa fa-user"></i>
                            <span> Make Agent</span></a></li>

                    <li @if(Request::is('make/reseller')) class="active" @endif><a href="{{ url('/make/reseller') }}"><i class="fa fa-user-secret"></i>
                            <span> Make Reseller</span></a></li>

                    <li @if(Request::is('make/bd/user')) class="active" @endif><a href="{{ url('/make/bd/user') }}"><i class="fa fa-user-plus"></i>
                            <span> Make BD User</span></a></li>



                </ul>
            </li>

            <li class="treeview @if(Request::is('user/add') || Request::is('user/list') || Request::is('admin/options')) active @endif">
                <a href="#">
                    <i class="fa fa-times"></i>
                    <span>Delete</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu @if(Request::is('make/agent') || Request::is('make/reseller') || Request::is('make/bd/user') || Request::is('admin/options')) menu-open @endif" style="display: @if(Request::is('admin') || Request::is('user/add') || Request::is('user/list') || Request::is('admin/options')) block @else none @endif">
                    <li @if(Request::is('make/agent')) class="active" @endif><a href="{{ url('/make/agent') }}"><i class="fa fa-user"></i>
                            <span> Make Agent</span></a></li>

                    <li @if(Request::is('make/reseller')) class="active" @endif><a href="{{ url('/make/reseller') }}"><i class="fa fa-user-secret"></i>
                            <span> Make Reseller</span></a></li>

                    <li @if(Request::is('make/bd/user')) class="active" @endif><a href="{{ url('/make/bd/user') }}"><i class="fa fa-user-plus"></i>
                            <span> Make BD User</span></a></li>



                </ul>
            </li>

            <li class="treeview @if(Request::is('user/add') || Request::is('user/list') || Request::is('admin/options')) active @endif">
                <a href="#">
                    <i class="fa fa-list"></i>
                    <span>View</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu @if(Request::is('make/agent') || Request::is('make/reseller') || Request::is('make/bd/user') || Request::is('admin/options')) menu-open @endif" style="display: @if(Request::is('admin') || Request::is('user/add') || Request::is('user/list') || Request::is('admin/options')) block @else none @endif">
                    <li @if(Request::is('make/agent')) class="active" @endif><a href="{{ url('/make/agent') }}"><i class="fa fa-user"></i>
                            <span> Make Agent</span></a></li>

                    <li @if(Request::is('make/reseller')) class="active" @endif><a href="{{ url('/make/reseller') }}"><i class="fa fa-user-secret"></i>
                            <span> Make Reseller</span></a></li>

                    <li @if(Request::is('make/bd/user')) class="active" @endif><a href="{{ url('/make/bd/user') }}"><i class="fa fa-user-plus"></i>
                            <span> Make BD User</span></a></li>



                </ul>
            </li>

            <li class="treeview @if(Request::is('report/add') || Request::is('user/list') || Request::is('admin/options')) active @endif">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Reports</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu @if(Request::is('make/agent') || Request::is('make/reseller') || Request::is('make/bd/user') || Request::is('admin/options')) menu-open @endif" style="display: @if(Request::is('admin') || Request::is('user/add') || Request::is('user/list') || Request::is('admin/options')) block @else none @endif">
                    <li @if(Request::is('make/agent')) class="active" @endif><a href="{{ url('/make/agent') }}"><i class="fa fa-user"></i>
                            <span> Make Agent</span></a></li>

                    <li @if(Request::is('make/reseller')) class="active" @endif><a href="{{ url('/make/reseller') }}"><i class="fa fa-user-secret"></i>
                            <span> Make Reseller</span></a></li>

                    <li @if(Request::is('make/bd/user')) class="active" @endif><a href="{{ url('/make/bd/user') }}"><i class="fa fa-user-plus"></i>
                            <span> Make BD User</span></a></li>



                </ul>
            </li>

            <li @if(Request::is('settings')) class="active" @endif ><a href="{{ url('/settings') }}"><i class="fa fa-gears"></i>
                    <span>Settings</span></a></li>

            <li @if(Request::is('profile')) class="active" @endif ><a href="{{ url('/profile') }}"><i class="fa fa-user"></i>
                    <span>Profile</span></a></li>





        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
