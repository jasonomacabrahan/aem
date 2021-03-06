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
            <form action="{{ route('saveresponse') }}" method="POST" class="mt-1 py-3">
                @csrf
                <div class="row">
                  @if ($message = Session::get('success'))
                  <script>
                      swal("Success","response Added","success");
                  </script>
                 @endif
                    <div class="col-md-11 pr-1">
                      <div class="form-group">
                        <label class="text-dark fw-bolder">{{__(" Task Detail Description")}}</label>
                          <ul>
                            <li><strong>Task:</strong> {{ $responses->taskDetail }}</li>
                            <li><strong>Project</strong> {{ $responses->shortName }}</li>
                            <li><strong>Date Created:</strong>  {{ $responses->created_at }}</li>
                          </ul>
                      </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-11 pr-1">
                        <div class="form-group">
                          <label for="resolutionDetails" class="text-dark fw-bolder">{{__("Response")}}</label><br>
                          <input type="hidden" name="id" value="{{ $responses->resolutionId }}">
                            <textarea class="form-contol border-info p-3" name="resolutionDetails" id="resolutionDetails" cols="60" rows="10">{{ $responses->resolutionDetails }}</textarea>
                          @include('alerts.feedback', ['field' => 'resolutionDetails'])
                        </div>
                      </div>
                </div>

                <button type="submit" class="btn btn-info"><i class="fa fa-fw fa-save"></i> Save Changes  </button>
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
