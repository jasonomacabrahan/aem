<div class="sidebar" data-color="blue">
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
          <a href="">
            <i class="now-ui-icons design_app"></i>
            <p>{{ __('Welcome...') }}</p>
          </a>
        </li>
      </ul>
    </div>
  </div>
  