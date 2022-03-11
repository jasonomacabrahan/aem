<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-info navbar-absolute">
  <div class="container-fluid">
    <div class="navbar-wrapper text-white">
     <a href="" style="text-decoration:none; display:inline;"><img src="{{ asset('assets').'/img/favicon.png' }}" style="width:50px;height:50px; padding: 0px; margin: 0px;" alt=" DICT XI ">  <span style="font-size: 20px; font-weight: bolder;">&nbspDICT XI  - AEM</span></a>

    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-bar navbar-kebab"></span>
      <span class="navbar-toggler-bar navbar-kebab"></span>
      <span class="navbar-toggler-bar navbar-kebab"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navigation">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="{{ route('home.index') }}" class="nav-link">
            <i class="now-ui-icons design_app"></i> {{ __(" Home ") }}
          </a>
        </li>
        <li class="nav-item @if ($activePage == 'register') active @endif">
          <a href="{{ route('register.show') }}" class="nav-link">
            <i class="now-ui-icons tech_mobile"></i> {{ __("Register") }}
          </a>
        </li>
        <li class="nav-item @if ($activePage == 'login') active @endif ">
          <a href="{{ route('login.show') }}" class="nav-link">
            <i class="now-ui-icons users_circle-08"></i> {{ __("Login") }}
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->
