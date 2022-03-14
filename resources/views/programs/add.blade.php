@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'PROGRAMS AND PROJECTS',
    'activePage' => 'programs',
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
              <h5 class="title">{{__(" Add Program and Project")}}</h5>

            </div>
            <div class="card-body">
              <form action="program.add" method="POST" class="mt-1 py-3">
                @csrf
                <div class="row">
                    <div class="col-md-11 pr-1">
                      <div class="form-group">
                        <label  class="text-dark fw-bold"  for="shortName">{{__(" Short Name")}}</label>
                        <input type="text" name="shortName" class="form-control" placeholder="Enter Short Name" value="{{ old('shortName') }}" required>
                        @include('alerts.feedback', ['field' => 'shortName'])
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-11 pr-1">
                      <div class="form-group">
                        <label class="text-dark fw-bold" for="programDescription">{{__(" Program Description ")}}</label>
                        <input type="text" name="programDescription" class="form-control" placeholder="Enter Program Description" value="{{ old('programDescription') }}" required>
                        @include('alerts.feedback', ['field' => 'programDescription'])
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-11 pr-1">
                      <div class="form-group">
                        <label class="text-dark fw-bold" for="focalPerson">{{__("Focal Person")}}</label>
                        <input type="text" name="focalPerson" class="form-control" placeholder="Enter Focal Person" value="{{ old('focalPerson') }}">
                        @include('alerts.feedback', ['field' => 'focalPerson'])
                      </div>
                    </div>
                </div>

                <a href="/programs.index" class="btn btn-danger"><i class="fa-solid fa-fw fa-angle-left"></i>Back to Program & Projects</a>
                <button type="submit" class="btn btn-info"><i class="fa-solid fa-fw fa-save"></i>Add Program & Projects</button>
            </form>
            </div>
          </div>

            @if ($message = Session::get('success'))
                 <script>
                     swal("Success","Program or Project added","success");
                 </script>
                @endif

            @if ($message = Session::get('error'))
                 <script>
                     swal("Oops","Duplicate Entry","error");
                 </script>
                @endif
            
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
