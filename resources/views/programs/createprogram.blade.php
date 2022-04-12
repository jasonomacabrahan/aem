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
              <strong class="text-white">Add Project</strong>
            </div>
            <div class="card-body">
              <form action="{{ route('savecreatedprogram') }}" method="POST" class="mt-1 py-3">
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
                

                {{-- <a href="{{ route('program.index') }}" class="btn btn-danger"><i class="fa-solid fa-fw fa-angle-left"></i>Back to Program & Projects</a> --}}
                <button type="submit" class="btn btn-info"><i class="fa-solid fa-fw fa-save"></i>Add Program & Projects</button>
            </form>
            </div>
          </div>

            @if ($message = Session::get('success'))
                 <script>
                     swal("Success","Project added","success");
                 </script>
            @endif
            
            @if ($message = Session::get('successfocal'))
                 <script>
                     swal("Success","Assigning Focal was successful","success");
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
                        <strong class="text-white"><i class="fa fa-fw fa-th-list"></i>Projects</strong>
                    </div>
                    <div class="card-body">
                        
                        

                        <table id="list" class="table table-striped table-hover table-bordered" style="width:100%">
                            <thead>
                                <tr style='font-size: 8pt;'>
                                    <th style='font-weight: bolder;'>Short Name</th>
                                    <th style='font-weight: bolder;'>Description</th>
                                    <th style='font-weight: bolder;'>Focal Person</th>
                                    <th style='font-weight: bolder;'>Created</th>
                                    <th style='font-weight: bolder;'>Updated</th>    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($programs as $program)
                                    <tr>
                                        <td>
                                            {{-- <a href="{{route('edit', ['id' => $program->id ])}}" title="Update program"></i><i class="fa fa-fw fa-edit"></i>{{ $program->shortName }}</a> --}}
                                            {{ $program->shortName }}
                                        </td>
                                        <td>
                                            <a class="btn btn-link text-left" data-toggle="modal" data-target="#prog{{$program->id}}">{{ $program->programDescription }}</a>
                                            <div class="modal fade" id="prog{{$program->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel">Update Project Details</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                                    <form action="{{ route('saveselecteddescription') }}" method="post">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <input type="hidden" name="id" value="{{ $program->id }}">
                                                            <div class="form-group">
                                                              <input type="text" name="shortName" class="form-control border-info rounded-0" value="{{ $program->shortName }}">
                                                            </div>
                                                            <div class="form-group">
                                                              <label>Program Description</label>
                                                              <textarea name="programDescription" class="form-control form-bordered border-info rounded-0" id="programDescription" cols="50" rows="5">{{ $program->programDescription }}</textarea>
                                                            </div>  
                                                        
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger rounded-0" data-dismiss="modal">Close</button>
                                                            &nbsp;
                                                            <button type="submit" class="btn btn-info rounded-0">Save</button>
                                                        </div>
                                                    </form>
                                                  </div>
                                                </div>
                                              </div>
                                        </td>
                                        <td>
                                            @if ($program->focalPerson==null)
                                                <a href="#" data-toggle="modal" class="btn btn-xs btn-info rounded-0" data-target="#focal{{$program->id}}"><i class="fa fa-fw fa-plus"></i>Assign Focal</a>
                                                <div class="modal fade" id="focal{{$program->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <h5 class="modal-title" id="exampleModalLabel">Select Focal</h5>
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                          </button>
                                                        </div>
                                                        <form action="{{ route('saveselectedfocal') }}" method="post">
                                                            @csrf
                                                        <div class="modal-body">
                                                                @php
                                                                    $focal = App\Models\User::Select('name','users.id')
                                                                                    ->join('roles','roles.id','=','users.role_id')
                                                                                    ->where('title','Focal')
                                                                                    ->orWhere('title','Administrator')
                                                                                    ->get();
                                                                @endphp
                                                                <input type="hidden" name="id" value="{{ $program->id }}">
                                                                <select class="form-control rounded-0 border-info" name="focalPerson" id="focalPerson" required>
                                                                    <option></option>
                                                                    @foreach($focal as $f)
                                                                    <option value="{{ $f->id }}"> {{ $f->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger rounded-0" data-dismiss="modal">Close</button>
                                                                &nbsp;
                                                                <button type="submit" class="btn btn-info rounded-0">Save</button>
                                                            </div>
                                                        </form>
                                                      </div>
                                                    </div>
                                                  </div>
                                            @else
                                            <div class="modal fade" id="focal{{$program->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel">Select Focal</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                                    <form action="{{ route('saveselectedfocal') }}" method="post">
                                                        @csrf
                                                    <div class="modal-body">
                                                            @php
                                                                $focal = App\Models\User::Select('name','users.id')
                                                                                ->join('roles','roles.id','=','users.role_id')
                                                                                ->where('title','Focal')->get();
                                                            @endphp
                                                            <input type="hidden" name="id" value="{{ $program->id }}">
                                                            <select class="form-control rounded-0 border-info" name="focalPerson" id="focalPerson" required>
                                                                @foreach($focal as $f)
                                                                <option value="{{ $f->id }}"> {{ $f->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger rounded-0" data-dismiss="modal">Close</button>
                                                            &nbsp;
                                                            <button type="submit" class="btn btn-info rounded-0">Save</button>
                                                        </div>
                                                    </form>
                                                  </div>
                                                </div>
                                              </div>

                                                @php
                                                    $data = App\Models\User::Select('name')->where('id',$program->focalPerson)->get();
                                                @endphp

                                                @foreach($data as $element)
                                                    <a class="btn btn-link" data-toggle="modal" data-target="#focal{{$program->id}}"> {{ $element->name ?? '' }}</a>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>{{ $program->created_at }}</td>
                                        <td>{{ $program->updated_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot style='font-size: 8pt;'>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Focal Person</th>
                                    <th>Created@</th>
                                    <th>Updated</th>
                                    
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
