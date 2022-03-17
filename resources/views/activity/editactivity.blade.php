@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Add Activity',
    'activePage' => 'activitys',
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
    @foreach($activities as $activity)
          <div class="card">
            <div class="card-header">
              <h5 class="title"><i class="fa fa-fw fa-plus"></i>{{__(" Update Event and Activity")}}</h5>
                <div class="alert alert-info">
                  <strong>Current Activity Start and End Date: <span class="badge badge-warning">{{ $activity->activityDateStart }} to {{ $activity->activityDateEnd }}</span></strong>
                </div>
            </div>

            <div class="card-body">
            <form action="{{ route('saveactivitychanges') }}" method="POST" class="mt-1 py-3">
                @csrf
                <div class="row">
                    <div class="col-md-11 pr-1">
                        <div class="form-group">
                            <label for="activityDescription">{{__(" Activity Description")}}</label>
                            <input type="text" name="activityDescription" class="form-control rounded-0" placeholder="Enter Activity Description" value="{{ $activity->activityDescription }}" required>
                            @include('alerts.feedback', ['field' => 'activityDescription'])
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-11 pr-1">
                        <div class="form-group">
                            <label for="location">{{__(" Activity Location  ")}}</label>
                            <input type="text" name="location" class="form-control rounded-0" placeholder="Enter Activity Location" value="{{ $activity->location  }}" required>
                            @include('alerts.feedback', ['field' => 'location'])
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-11 pr-1">
                        <div class="form-group">
                            <label for="activityDateStart">{{__(" Activity Start Date ")}}</label>
                            <input class="form-control date  rounded-0 {{ $errors->has('activityDateStart') ? ' is-invalid' : '' }}s" type="date" value="{{ (!empty($program) && $program->activityDateStart) ?
                                \Carbon\Carbon::parse($program->activityDateStart)->format('d/m/Y') : '' }}"  name="activityDateStart"
                            id="activityDateStart" required/>
                        </div>
                        @if ($errors->has('activityDateStart'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                          <strong>{{ $errors->first('activityDateStart') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-11 pr-1">
                      <div class="form-group">
                        <label for="activityDateEnd">{{__(" Activity End Date ")}}</label>
                        <input class="form-control date rounded-0 {{ $errors->has('activityDateEnd') ? ' is-invalid' : '' }}" type="date" value="{{ (!empty($program) && $program->activityDateEnd) ?
                            \Carbon\Carbon::parse($program->activityDateEnd)->format('d/m/Y') : '' }}"  name="activityDateEnd"
                            id="activityDateEnd" required/>
                        </div>
                        @if ($errors->has('activityDateEnd'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                          <strong>{{ $errors->first('activityDateEnd') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-11 pr-1">
                      <div class="form-group">
                          <label for="papID">{{__(" Program / Project ")}}</label>
                          <select class="form-control rounded-0" name="papID" id="papID" required>
                            @foreach($programs as $program)
                            <option value="{{ $program->id }}">{{ $program->shortName }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <input type="hidden" name="id" value="{{ Crypt::encryptString($activity->id) }}">
            @endforeach
            <button type="submit" class="btn btn-info"><i class="fa fa-fw fa-save"></i>Save Activity Changes </button>
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
