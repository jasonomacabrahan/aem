@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Activity Expense',
    'activePage' => 'addexpense',
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
              <h5 class="title">{{__(" Update Event / Activity Expense Entry ")}}</h5>
            </div>

            <div class="card-body">
              @if ($message = Session::get('success'))
              <script>
                  swal("Success...","","success");
              </script>
              @endif

            <form action="/saveexpensesupdate" method="POST" class="mt-1 py-3">
                @csrf
                @foreach ($expenses as $expense)
                

                <div class="row">
                    <div class="col-md-11 pr-1">
                      <div class="form-group">
                        <label for="fuelLubricants">{{__(" Fuel & Lubricants")}}</label>
                        <input type="hidden" name="id" value="{{$expense->id}}">
                        <input type="text" name="fuelLubricants" class="form-control" placeholder="Enter Fuel & Lubricants" value="{{$expense->fuelLubricants}}" required>
                        @include('alerts.feedback', ['field' => 'fuelLubricants'])
                      </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-11 pr-1">
                      <div class="form-group">
                        <label for="travelPerDiem">{{__(" Travel Per Diem")}}</label>
                        <input type="text" name="travelPerDiem" class="form-control" placeholder="Enter Travel Per Diem" value="{{$expense->travelPerDiem}}" required>
                        @include('alerts.feedback', ['field' => 'travelPerDiem'])
                      </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-11 pr-1">
                      <div class="form-group">
                        <label for="foodAccommodation">{{__(" Food & Accommodation")}}</label>
                        <input type="text" name="foodAccommodation" class="form-control" placeholder="Enter Food & Accommodation" value="{{$expense->foodAccommodation}}" required>
                        @include('alerts.feedback', ['field' => 'foodAccommodation'])
                      </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-11 pr-1">
                      <div class="form-group">
                        <label for="miscExpense">{{__(" Miscellaneous Expense")}}</label>
                        <input type="text" name="miscExpense" class="form-control" placeholder="Enter Miscellaneous Expense" value="{{$expense->miscExpense}}" required>
                        @include('alerts.feedback', ['field' => 'miscExpense'])
                      </div>
                    </div>
                </div>

                {{-- <div class="row">
                    <div class="col-md-11 pr-1">
                      <div class="form-group">
                        <label for="activityNotes">{{__(" Activity Notes")}}</label>
                        <input type="text" name="activityNotes" class="form-control" placeholder="Enter Activity Notes" value="{{ old('activityNotes') }}" required>
                        @include('alerts.feedback', ['field' => 'activityNotes'])
                      </div>
                    </div>
                </div> --}}
                @endforeach
                <a href="/expenses" class="btn btn-danger"><i class="fa-solid fa-fw fa-angle-left"></i>Back</a>
                <button type="submit" class="btn btn-info">Save</button>
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
