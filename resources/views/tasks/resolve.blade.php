@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Add Response | ',
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
            <form action="{{ route('resolved') }}" method="POST" class="mt-1 py-3">
                
                @csrf
                <div class="row">
                  @if ($message = Session::get('success'))
                  <script>
                      swal("Success","response Added","success");
                  </script>
                 @endif

                    <div class="col-md-11 pr-1">
                      <ul class="list-group">
                        <li class="list-group-item active">Task: {{ $responses->taskDetail }}</li>
                        <li class="list-group-item"><i class="fa fa-fw fa-angle-right"></i>Project: {{ $responses->shortName }}</li>
                        <li class="list-group-item"><i class="fa fa-fw fa-angle-right"></i>Date Created: {{ $responses->resodate }}</li>
                        <input type="hidden" name="id" value="{{ $responses->resoid }}">
                        <li class="list-group-item">
                          <select class="form-control rounded-0 border-info" name="taskResolved" required>
                            <option></option>
                            <option value="1">YES</option>
                            <option value="0">NO</option>
                            <option value="2">Progress</option>
                          </select>
                        </li>
                        <li class="list-group-item active">
                          <button type="submit" class="btn btn-success"><i class="fa fa-fw fa-thumbs-up"></i></button>
                        </li>
                      </ul>
                    </div>
                </div>

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
