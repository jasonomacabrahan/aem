@extends('layouts.app', [
    'namePage' => 'Welcome',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'welcome',
    'backgroundImage' => asset('assets') . "/img/bg2.png",
])

@section('content')
  <div class="content">
    <div class="container">
      <div class="col-md-12 ml-auto mr-auto">
          <div class="header bg-gradient-primary py-10 py-lg-2 pt-lg-12">
              <div class="container">
                  <div class="header-body text-center mb-7">
                      <div class="row justify-content-center">
                          <div class="col-lg-12 col-md-9">
                              <h3 class="text-white">{{ __('Welcome to DICT - XI ( Davao Region ) Activity Event Monitoring System.') }}</h3>
                              <a href="{{ route('register') }}" class="btn btn-lg btn-info"><i class="fa-solid fa-fw fa-user-astronaut"></i>Register Now</a>
                              <hr>
                              <h6 class="text-white">{{ __('Soon in Play Store and App Store. For now you can click button below.') }}</h6>
                             
                              <a href="{{ asset('app') }}/DICTAPP.apk" class="btn btn-lg btn-danger"><i class="fa-solid fa-fw fa-download"></i>Download</a>

                              <p class="text-lead text-light mt-3 mb-0">
                                  @include('alerts.migrations_check')
                              </p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-md-4 ml-auto mr-auto">
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      demo.checkFullPageBackgroundImage();
    });
  </script>
@endpush
