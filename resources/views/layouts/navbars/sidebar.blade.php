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
      <li class="@if ($activePage == 'home') active @endif">
        <a href="{{ route('home') }}">
          <i class="now-ui-icons design_app"></i>
          <p>{{ __('Dashboard - ' . auth()->user()->usertype ) }}</p>
        </a>
      </li>

      <li>
        <a data-toggle="collapse" href="#User">
            <i class="fab fa-laravel"></i>
          <p>
            {{ __("User") }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse hide" id="User">
          <ul class="nav">
            <li class="@if ($activePage == 'profile') active @endif">
              <a href="{{ route('profile.edit') }}">
                <i class="now-ui-icons users_single-02"></i>
                <p> {{ __("User Profile") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'users') active @endif">
                <a href="{{__('./usertrainings/'.auth()->user()->id) }}">
                  <i class="now-ui-icons design_bullet-list-67"></i>
                  <p> {{ __("Training Registered") }} </p>
                </a>
              </li>
          </ul>
        </div>
        </li>
@if (auth()->user()->usertype == 'admin') {
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
                  </li>
              </ul>
            </div>
            </li>
        } @endif

        <li class="@if ($activePage == 'registration') active @endif">
            <a href="{{ route('activity.reg') }}">
              <i class="now-ui-icons objects_planet"></i>
              <p> {{ __("Activity Registration") }} </p>
            </a>
        </li>
<!---  start of old menu --
            <li class="@if ($activePage == 'users') active @endif">
              <a href="{{ route('user.index') }}">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p> {{ __("User Management") }} </p>
              </a>
            </li>
          </ul>
      <li class="@if ($activePage == 'icons') active @endif">
        <a href="{{ route('page.index','icons') }}">
          <i class="now-ui-icons education_atom"></i>
          <p>{{ __('Icons') }}</p>
        </a>
      </li>
      <li class = "@if ($activePage == 'maps') active @endif">
        <a href="{{ route('page.index','maps') }}">
          <i class="now-ui-icons location_map-big"></i>
          <p>{{ __('Maps') }}</p>
        </a>
      </li>
      <li class = " @if ($activePage == 'notifications') active @endif">
        <a href="{{ route('page.index','notifications') }}">
          <i class="now-ui-icons ui-1_bell-53"></i>
          <p>{{ __('Notifications') }}</p>
        </a>
      </li>
      <li class = " @if ($activePage == 'table') active @endif">
        <a href="{{ route('page.index','table') }}">
          <i class="now-ui-icons design_bullet-list-67"></i>
          <p>{{ __('Table List') }}</p>
        </a>
      </li>
      <li class = "@if ($activePage == 'typography') active @endif">
        <a href="{{ route('page.index','typography') }}">
          <i class="now-ui-icons text_caps-small"></i>
          <p>{{ __('Typography') }}</p>
        </a>
      </li>
      <li class = "">
        <a href="{{ route('page.index','upgrade') }}" class="bg-info">
          <i class="now-ui-icons arrows-1_cloud-download-93"></i>
          <p>{{ __('Upgrade to PRO') }}</p>
        </a>
      </li>
      ---  end of old menu -->
    </ul>
  </div>
</div>
