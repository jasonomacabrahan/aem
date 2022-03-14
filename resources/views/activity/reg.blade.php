@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Activity Registration',
    'activePage' => 'registration',
    'activeNav' => '',
    'backgroundImage' => asset('now') . "/img/logo.png",
])

@php
// $activies = DB::table('activities')->where('activityDateStart', '>=', now())->get();
$activies = DB::table('activities')->get();
@endphp

@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
<!--        <div class="col-md-12"> -->
          <div class="card">
            <div class="card-header">
              <h5 class="title">{{__(" Event and Activity Registration ")}}</h5>
            </div>

            <div class="card-body">
            <form action="saveactivity" method="POST" class="mt-1 py-3">
                @csrf
                <div class="row">
                    <div class="col-md-11 pr-1">
                      <div class="form-group">
                        <label class="font-weight-bold text-dark" for="ActivityID">{{__(" Program / Project ")}}</label>
                        <select class="form-control" name="ActivityID" id="ActivityID">
                            @foreach($activies as $activity)
                            <option value="{{ $activity->id }}">{{ $activity->activityDescription }}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                
                </div>

                <div class="row">
                    <div class="col-md-11 pr-1">
                      <div class="form-group">
                        <label class="font-weight-bold text-dark" for="registrationDate">{{__(" Registration Date ")}}</label>
                        <input class="form-control date" type="date" value="{{ (!empty($program) && $program->registrationDate) ?
                            \Carbon\Carbon::parse($program->registrationDate)->format('d/m/Y') : '' }}"  name="registrationDate"
                            id="registrationDate" />
                      </div>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-info"> Register </button>
                @if ($message = Session::get('success'))
                        <script>
                            swal("Thank you","Activity Registration was Successful","success");
                        </script>
                  @endif


                  @if ($message = Session::get('error'))
                        <script>
                            swal("Oops!","You already registered to this activity","error");
                        </script>
                  @endif
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
