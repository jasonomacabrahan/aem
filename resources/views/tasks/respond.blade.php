@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Add Response',
    'activePage' => 'respond',
    'activeNav' => '',
    'backgroundImage' => asset('now') . "/img/logo.png",
])

@section('content')
@php
   $programs = DB::table('programs')->get();
@endphp
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
<!--        <div class="col-md-12"> -->
          <div class="card">
            <div class="card-header">
              <h5 class="title">{{__(" Task Response")}}</h5>
            </div>

            <div class="card-body">
            <form action="tasks.respond" method="POST" class="mt-1 py-3">
                @csrf
                <div class="row">
                    <div class="col-md-11 pr-1">
                      <div class="form-group">
                        <label for="taskDetail">{{__(" Task Detail Description")}}</label>
                        <p>{{ $responses->taskDetail }}</p>
                        <p>{{ $responses->shortName }}</p>
                        <p>{{ $responses->created_at }}</p>
                      </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-11 pr-1">
                        <div class="form-group">
                          <label for="resolutionDetails">{{__(" Task Response  ")}}</label>
                          <input type="text" name="resolutionDetails" class="form-control" placeholder="Enter Resolution Details " value="{{ old('resolutionDetails') }}" required>
                          @include('alerts.feedback', ['field' => 'resolutionDetails'])
                        </div>
                      </div>
                </div>

                <button type="submit" class="btn btn-primary btn-round"> Submit  </button>
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
