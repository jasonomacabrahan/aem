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
        <div class="col-md-4">
          <div class="card">
            <div class="card-header bg-info">
              <strong class="text-white">Add Program and Project</strong>
            </div>
            <div class="card-body">
              <form action="{{ route('saveprogram') }}" method="POST" class="mt-1 py-3">
                @csrf
                <div class="row">
                    <div class="col-md-11 pr-1">
                      <div class="form-group">
                        <label  class="text-dark fw-bold"  for="shortName">{{__(" Short Name")}}</label>
                        <input type="text" name="shortName" class="form-control rounded-0" placeholder="iLGU" value="{{ old('shortName') }}" required>
                        @include('alerts.feedback', ['field' => 'shortName'])
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-11 pr-1">
                      <div class="form-group">
                        <label class="text-dark fw-bold" for="programDescription">{{__(" Program Description ")}}</label>
                        <input type="text" name="programDescription" class="form-control rounded-0" placeholder="Integrated Local Government Unit ....." value="{{ old('programDescription') }}" required>
                        @include('alerts.feedback', ['field' => 'programDescription'])
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-11 pr-1">
                      <div class="form-group">
                        <label class="text-dark fw-bold" for="focalPerson">Focal</label>
                        <select name="focalPerson" id="focalPerson" class="form-control rounded-0" required>
                                <option></option>
                                @foreach ($list as $lists)
                                    <option value="{{ $lists->id }}">{{ $lists->name }}</option>
                                @endforeach
                        </select>

                

                        @include('alerts.feedback', ['field' => 'focalPerson'])
                      </div>
                    </div>
                </div>

                <a href="{{ route('program.index') }}" class="btn btn-danger"><i class="fa-solid fa-fw fa-angle-left"></i>Back to Program & Projects</a>
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
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-info">
                        <strong class="text-white"><i class="fa fa-fw fa-user"></i>Programs & Focal</strong>
                    </div>
                    <div class="card-body">
                        <table id="list" class="table table-striped table-hover table-bordered" style="width:100%">
                            <thead >
                                <tr style='font-size: 8pt;'>
                                    <th style='font-weight: bolder;'>Short Name</th>
                                    <th style='font-weight: bolder;'>Description</th>
                                    <th style='font-weight: bolder;'>Focal Person</th>
                                    <th style='font-weight: bolder;'>Created@</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($programs as $program)
                                    <tr>
                                        <td><a href="{{route('updateprogram', ['id' => $program->programid ])}}" title="Update program"></i><i class="fa fa-fw fa-edit"></i>{{ $program->shortName }}</a></td>
                                        <td>{{ $program->programDescription }}</a></td>
                                        <td>{{ $program->name }}</td>
                                        <td>{{ $program->created_at }}</td>
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot style='font-size: 8pt;'>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Focal Person</th>
                                    <th>Created@</th>
                                    
                                </tr>
                            </tfoot>
                        </table>
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
