@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Edit Profile',
    'activePage' => '',
    'activeNav' => '',
    'backgroundImage' => asset('now') . "/img/logo.png",
])


@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
<!--        <div class="col-md-12"> -->
    <div class="card">
        <div class="card-header">
          <h5 class="title">{{__(" Edit Profile")}}</h5>
        </div>
        <div class="card-body">
            @if ($message = Session::get('success'))
              <script>
                  swal("Success...","Changes Saved","success");
              </script>
              @endif
          <form method="post" action="{{ route('saveuserupdate') }}" autocomplete="off" enctype="multipart/form-data">
            @csrf
            @include('alerts.success')
            @foreach ($users as $user)
              <div class="row">
                  <div class="col-md-7 pr-1">
                      <div class="form-group">
                          <label>{{__(" Name")}}</label>
                              <input type="hidden" name="id" class="form-control" value="{{ $user->id }}">
                              <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                              @include('alerts.feedback', ['field' => 'name'])
                      </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-7 pr-1">
                  <div class="form-group">
                    <label for="exampleInputEmail1">{{__(" Email address")}}</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}">
                    @include('alerts.feedback', ['field' => 'email'])
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-7 pr-1">
                  <div class="form-group">
                    <label for="exampleInputEmail1">{{__(" Contact Number")}}</label>
                    <input type="text" name="contactNumber" class="form-control" value="{{ $user->contactNumber }}">
                    @include('alerts.feedback', ['field' => 'contactNumber'])
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-7 pr-1">
                  <div class="form-group">
                    <label for="exampleInputEmail1">{{__("Agency")}}</label>
                    <input type="text" name="agency" class="form-control" value="{{ $user->agency }}">
                    @include('alerts.feedback', ['field' => 'agency'])
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-7 pr-1">
                  <div class="form-group">
                    <label for="exampleInputEmail1">{{__("Division")}}</label>
                    <input type="text" name="division" class="form-control" value="{{ $user->division }}">
                    @include('alerts.feedback', ['field' => 'division'])
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-7 pr-1">
                  <div class="form-group">
                    <label for="exampleInputEmail1">{{__("Designation")}}</label>
                    <input type="text" name="designation" class="form-control" value="{{ $user->designation }}">
                    @include('alerts.feedback', ['field' => 'designation'])
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-7 pr-1">
                  <div class="form-group">
                    <label for="exampleInputEmail1">{{__("User Level")}}</label>
                    <select class="form-control" name="usertype" id="usertype">
                            <option value="{{ $user->usertype}}" selected hidden>{{ ucfirst($user->usertype) }}</option>
                            <option value="admin">Admin</option>
                            <option value="registrant">Registrant</option>
                    
                    </select>
                    @include('alerts.feedback', ['field' => 'usertype'])
                  </div>
                </div>
              </div>

            <div class="card-footer ">
              <button type="submit" class="btn btn-info"><i class="fa-solid fa-fw fa-floppy-disk"></i>{{__('Save')}}</button>
            </div>
            <hr class="half-rule"/>
            @endforeach
          </form>
        </div>
    </div>

 <!--       </div> -->
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

<script>
    $(document).ready(function() {
    $('.date').datepicker({
        firstDayOfWeek: 1, // The first day of week is Monday
        weekDayFormat: 'narrow', // Only first letter for the weekday names
        inputFormat: 'd/M/y',
        outputFormat: 'd/M/y',
        titleFormat: 'EEEE d MMMM y',
        markup: 'bootstrap4',
        theme: 'bootstrap',
        modal: false
    });
});
</script>
