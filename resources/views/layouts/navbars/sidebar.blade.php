<div class="sidebar" data-color="blue">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
-->
<div class="logo" style="border: 1px solid white; background-color: white;">
    <a href="/home" class="simple-text logo-mini">
        <img src="{{ asset('assets').'/img/favicon.png' }}" alt=" DICT XI ">
    </a>
    <a href="#" class="simple-text logo-normal text-dark font-weight-bolder">
      {{ __('DICT XI  - AEM') }}
    </a>
  </div>
  <div class="sidebar-wrapper" id="sidebar-wrapper">
    <ul class="nav">
                     
      {{-- @can('admin_panel_access')
        <li>
            <a href="{{ route('admin.home') }}" aria-expanded="false">
              <i class="fa fa-fw fa-dashboard"></i>
              <p>Dashboard- {{ auth()->user()->name }}</p>
            </a>
        </li>
      @endcan --}}

      @can('dashboard')
      <li class="@if ($activePage == 'dashboard') active @endif">
        <a href="{{ route('dashboard.index') }}" aria-expanded="false">
          <i class="fa fa-fw fa-dashboard"></i>
          <p>Dashboard</p>
        </a>
      </li>
      @endcan

      @can('activity_registration')
        <li class="@if ($activePage == 'registration') active @endif">
          <a href="{{ route('activityregistration') }}">
            <i class="fas fa-skating"></i>
            <p> {{ __("Activity Registration") }} </p>
          </a>
        </li>
      @endcan()

                        

                            @can('training_registered')
                              <li class="">
                                <a href="{{ route('usertrainings') }}">
                                  <i class="now-ui-icons design_bullet-list-67"></i>
                                  <p> {{ __("Training Registered") }} </p>
                                </a>
                              </li>
                            @endcan()
        
                            @can('my_task')
                              <li class="">
                                <a href="{{ route('mytasks')  }}">
                                  <i class="now-ui-icons design_bullet-list-67"></i>
                                  <p> {{ __("My Tasks") }} </p>
                                </a>
                              </li>
                            @endcan()

                            @can('userlogs')
                              <li class="">
                                <a href="{{ route('userlogs')  }}">
                                  <i class="now-ui-icons design_bullet-list-67"></i>
                                  <p> {{ __("User Logs") }} </p>
                                </a>
                              </li>
                            @endcan()

                            @can('master_tables')
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
                                      <li class="@if ($activePage == 'tasks') active @endif">
                                          <a href="{{ route('tasks.index') }}">
                                            <i class="now-ui-icons shopping_shop"></i>
                                            <p> {{ __(" Tasks ") }} </p>
                                          </a>
                                      </li>
                                      @can('manuallyassignfocal')
                                        <li class="@if ($activePage == 'programs') active @endif">
                                          <a href="">
                                            <i class="now-ui-icons shopping_shop"></i>
                                            <p> {{ __(" Programs/Focal ") }} </p>
                                          </a>
                                        </li>  
                                      @endcan()

                                      @can('programs')    
                                      <li class="@if ($activePage == 'programs') active @endif">
                                        <a href="{{ route('program.index') }}">
                                          <i class="now-ui-icons shopping_shop"></i>
                                          <p> {{ __(" Programs ") }} </p>
                                        </a>
                                      </li>
                                      @endcan

                                      @can('activityindex')
                                      <li class="@if ($activePage == 'activitys') active @endif">
                                          <a href="{{ route('activity.index') }}">
                                            <i class="now-ui-icons ui-1_send"></i>
                                            <p> {{ __("Activity Management") }} </p>
                                          </a>
                                      </li>
                                      @endcan()

                                      @can('expense')
                                      <li class="@if ($activePage == 'expenses') active @endif">
                                          <a href="{{ route('activity.expenses') }}">
                                            <i class="now-ui-icons business_money-coins"></i>
                                            <p> {{ __("Activity Expenses") }} </p>
                                          </a>
                                      </li>
                                      @endcan()
                                      
                                    </ul>
                                  </div>
                                  </li>
                              @endcan()
                               @can('view_usermanagement')
                              <li>
                                <a data-toggle="collapse" href="#user">
                                    <i class="fa fa-fw fa-users"></i>
                                    <p>
                                      {{ __("User Management") }}
                                    <b class="caret"></b>
                                  </p>
                                </a>
                                <div class="collapse hide" id="user">
                                  <ul class="nav">
                                        @can('users_access')
                                          <li li class="active">
                                            <a href="{{ route('admin.users.index') }}">
                                                <i class="fa fa-fw fa-user"></i>
                                                <span class="hide-menu">Users</span>
                                            </a>
                                          </li>
                                          @endcan()
                                          
                                          @can('roles_access')
                                          <li class="">
                                            <a href="{{ route('admin.roles.index') }}" aria-expanded="false">
                                              <i class="fa fa-fw fa-cog"></i>
                                              <span class="hide-menu">Roles</span>
                                            </a>
                                          </li>
                                          @endcan()
                                          
                                          @can('permissions_access')
                                          <li class="">
                                            <a href="{{ route('admin.permissions.index') }}" aria-expanded="false">
                                              <i class="fa fa-fw fa-cog"></i>
                                              <span class="hide-menu">Permissions</span>
                                            </a>
                                          </li>
                                    @endcan()
                                    
                                  </ul>
                                </div>
                              </li>
                              @endcan()
      
                              
                              
                              
                              
                              
                              
    </ul>
  </div>
</div>
