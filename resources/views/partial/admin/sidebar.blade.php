        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Dashboard</span></li>

                        @can('admin_panel_access')
                        <!-- dashboard-->
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark  @if(request()->is('admin')) is_active @endif" href="{{ route('admin.home') }}" aria-expanded="false">
                                <i class="mr-3 fas fa-tachometer-alt fa-fw" aria-hidden="true"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        @endcan

                    @canany(['users_access','roles_access','permissions_access'])
                        <li>
                            <a data-toggle="collapse" href="#master">
                                <i class="now-ui-icons ui-1_settings-gear-63"></i>
                            <p>
                                {{ __("Master Tables") }}
                                <b class="caret"></b>
                            </p>
                            </a>
                            <div class="collapse hide" id="master">
                            <ul class="nav">

                                @can('users_access')
                                    <li class="@if ($activePage == 'users') active @endif">
                                        <a href="{{ route('admin.users.index') }}">
                                            <span class="hide-menu">Users</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('roles_access')
                                    <li class="@if ($activePage == 'roles') active @endif">
                                        <a href="{{ route('admin.roles.index') }}" aria-expanded="false">
                                            <i class="mr-3 mdi mdi-star" aria-hidden="false"></i>
                                            <span class="hide-menu">Roles</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('permissions_access')
                                    <li class="@if ($activePage == 'permission') active @endif">
                                        <a href="{{ route('admin.permissions.index') }}" aria-expanded="false">
                                            <i class="mr-3 mdi mdi-key" aria-hidden="false"></i>
                                            <span class="hide-menu">Permissions</span>
                                        </a>
                                    </li>
                                @endcan
                            

                                {{-- <li class="@if ($activePage == 'tasks') active @endif">
                                    <a href="{{ route('tasks.index') }}">
                                    <i class="now-ui-icons shopping_shop"></i>
                                    <p> {{ __(" Tasks ") }} </p>
                                    </a>
                                </li>
                                <li class="@if ($activePage == 'programs') active @endif">
                                    <a href="{{ route('programs.index') }}">
                                    <i class="now-ui-icons shopping_shop"></i>
                                    <p> {{ __(" Programs ") }} </p>
                                    </a>
                                </li>
                                <li class="@if ($activePage == 'activitys') active @endif">
                                    <a href="{{ route('activity.index') }}">
                                    <i class="now-ui-icons ui-1_send"></i>
                                    <p> {{ __("Activity Management") }} </p>
                                    </a>
                                </li>
                                <li class="@if ($activePage == 'expenses') active @endif">
                                    <a href="{{ route('activity.expenses') }}">
                                    <i class="now-ui-icons business_money-coins"></i>
                                    <p> {{ __("Activity Expenses") }} </p>
                                    </a>
                                </li>
                                <li class="@if ($activePage == 'users') active @endif">
                                    <a href="{{ route('user.index') }}">
                                    <i class="now-ui-icons design_bullet-list-67"></i>
                                    <p> {{ __("User Management") }} </p>
                                    </a>
                                </li> --}}
                            </ul>
                            </div>
                            </li>
                    @endcanany


                        {{-- <li class="sidebar-item selected"> <a class="sidebar-link has-arrow waves-effect waves-dark active" href="javascript:void(0)" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home feather-icon"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg><span class="hide-menu">Dashboard <span class="badge badge-pill badge-success">5</span></span></a>
                            <ul aria-expanded="false" class="collapse first-level in">
                                <li class="sidebar-item"><a href="index.html" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Modern Dashboard  </span></a></li>
                                <li class="sidebar-item active"><a href="index2.html" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Awesome Dashboard </span></a></li>
                                <li class="sidebar-item"><a href="index3.html" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Classy Dashboard </span></a></li>
                                <li class="sidebar-item"><a href="index4.html" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Analytical Dashboard </span></a></li>
                                <li class="sidebar-item"><a href="index5.html" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Minimal Dashboard </span></a></li>
                            </ul>
                        </li> --}}

                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
