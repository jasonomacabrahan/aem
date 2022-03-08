@extends('layouts.appchallenge', [
    'namePage' => 'Enter Confirmation Code',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'home',
    'backgroundImage' => asset('now') . "/img/bg14.jpg",
])

@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <div class="row">
    <div class="col-md-5">
      <div class="card">
        <div class="card-header bg-info">
          <h5 class="text-white">Enter Confirmation Code you received from your email</h5>
        </div>
        <div class="card-body">
          @if ($message = Session::get('error'))
                            <script>
                                swal("Error","Invalid Code","error");
                            </script>
          @endif
          <form method="POST" class="form-horizontal" action="{{ route('verifyotp') }}">
            @csrf
            <div class="input-group form-control-lg">
              <span class="input-group-prepend">
              <div class="input-group-text">
                  <i class="fa fa-fw fa-key"></i>
              </div>
              </span>
              <input type="hidden" name="email" value="{{ auth()->user()->email }}">
              <input class="form-control" placeholder="{{ __('Confirmation Code') }}" type="text" name="otp" required autofocus>
          </div>
        </div>
        <div class="card-footer ">
          <button  type="submit" class="btn btn-info btn-lg btn-block mb-3"><i class="ui-1_lock-circle-open"></i>{{ __('Verify OTP') }}</button>
        </form>
      </div>
      </div> 
    </div>
  </div>
</div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
@endpush
