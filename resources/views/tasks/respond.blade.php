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
              @if(session('status'))
                  <div class="alert alert-success">
                      {{ session('status') }}
                  </div>
              @endif

              @error('image')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
              @enderror
            <form action="{{ route('saverespond') }}" enctype="multipart/form-data" id="upload-image" method="POST" class="mt-1 py-3">
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
                            <li><strong>Task:</strong> {{ ucfirst($responses->taskDetail) }}</li>
                            <li><strong>Project</strong> {{ $responses->shortName }}</li>
                            <li><strong>Date Created:</strong>  {{ $responses->created_at }}</li>
                          </ul>
                      </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-11 pr-1">

                        <div class="form-group">
                          <label for="resolutionDetails" class="text-dark fw-bolder">{{__(" Task Response  ")}}</label>
                          <input type="hidden" name="id" value="{{ $responses->resoid }}">
                          <textarea name="resolutionDetails" id="resolutionDetails" class="form-control border border-info form-bordered" cols="30" rows="10" required></textarea>
                          @include('alerts.feedback', ['field' => 'resolutionDetails'])
                        </div>
                      </div>
                </div>

                <div class="row">
                    <div class="col-md-11 pr-1">
                      @error('name')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                      @enderror

                      <div class="btn-file input-group hdtuto control-group lst increment rounded-0" >
                        <input type="file" name="name[]" class="myfrm form-control">
                        <div class="input-group-btn  rounded-0"> 
                          <button class="btn btn-success" type="button"><i class="fldemo fa fa-fw fa-plus"></i></button>
                        </div>
                      </div>

                      <div class="clone hide">
                        <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                          <input type="file" name="name[]" class="myfrm form-control">
                          <div class="input-group-btn"> 
                            <button class="btn btn-danger" type="button"><i class="fldemo fa fa-fw fa-x"></i></button>
                          </div>
                        </div>
                      </div>

                      
                    </div>
                </div>
                <button type="submit" class="btn btn-info"><i class="fa fa-fw fa-paper-plane"></i> Submit  </button>
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

