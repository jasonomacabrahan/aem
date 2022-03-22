@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Add Activity ',
    'activePage' => 'activities',
    'activeNav' => '',
    'backgroundImage' => asset('now') . "/img/logo.png",
])

@section('content')
@php
   $programs = DB::table('programs')
                ->where('focalPerson',auth()->user()->id)
                ->get();
@endphp

<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-4">
          <div class="card">
            <div class="card-header bg-info">
              <strong class="text-white">Add Event and Activity</strong>
            </div>
            @if ($message = Session::get('success'))
                        <script>
                            swal("Success","Activity Added","success");
                        </script>
                    @endif


            <div class="card-body">
                <form action="{{ route('addactivity') }}" method="POST" class="mt-1 py-3">
                    @csrf
                    <div class="row">
                        <div class="col-md-11 pr-1">
                          <div class="form-group">
                            <label for="activityDescription">{{__(" Activity Description")}}</label>
                            <input type="text" name="activityDescription" class="form-control rounded-0" placeholder="Enter Activity Description" value="{{ old('activityDescription') }}" required>
                            @include('alerts.feedback', ['field' => 'activityDescription'])
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-11 pr-1">
                          <div class="form-group">
                            <label for="location">{{__(" Activity Location  ")}}</label>
                            <input type="text" name="location" class="form-control rounded-0" placeholder="Enter Activity Location" value="{{ old('location') }}" required>
                            @include('alerts.feedback', ['field' => 'location'])
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-11 pr-1">
                          <div class="form-group">
                            <label for="activityDateStart">{{__(" Activity Start Date ")}}</label>
                            <input class="form-control date  rounded-0" type="date" value="{{ (!empty($program) && $program->activityDateStart) ?
                                \Carbon\Carbon::parse($program->activityDateStart)->format('d/m/Y') : '' }}"  name="activityDateStart"
                                id="activityDateStart" required/>
                          </div>
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="col-md-11 pr-1">
                          <div class="form-group">
                            <label for="activityDateEnd">{{__(" Activity End Date ")}}</label>
                            <input class="form-control date rounded-0" type="date" value="{{ (!empty($program) && $program->activityDateEnd) ?
                                \Carbon\Carbon::parse($program->activityDateEnd)->format('d/m/Y') : '' }}"  name="activityDateEnd"
                                id="activityDateEnd" required/>
                          </div>
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="col-md-11 pr-1">
                          <div class="form-group">
                            <label for="papID">{{__(" Program / Project ")}}</label>
                            <select class="form-control rounded-0" name="papID" id="papID" required>
                                <option></option>
                                @foreach($programs as $program)
                                <option value="{{ $program->id }}">{{ $program->shortName }}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>
                    </div>
    
                    <button type="submit" class="btn btn-info"><i class="fa fa-fw fa-plus"></i>Add Activity  </button>
                </form>
            </div>
            </div>
        </div><!--end of col-md-4-->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info">
                  <strong class="text-white">Event and Activity</strong>
                </div>
                <div class="card-body">
                  <div class="table table-responsive">

                    <table id="list" class="table table-striped table-hover table-bordered" style="width:100%">
                      <thead >
                        <tr style='font-size: 8pt;'>
                          <th>Activity</th>
                          <th>Location</th>
                          <th>Program</th>
                          <th>Date | Start-End</th>
                          <th>Expenses</th>
                          <th>Date Created</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($activities as $activity)
                        <tr>
                          <td><a href="{{route('editactivity', ['id' => $activity->activityid])}}" title="Update activity"><i class="fa fa-fw fa-edit"></i>{{ $activity->activityDescription }}</a></td>
                          <td>{{ $activity->location }}</a></td>
                          <td>{{ $activity->shortName }}</td>
                          <td><label class="badge badge-success text-white">{{ $activity->activityDateStart }} to {{ $activity->activityDateEnd }}</label></td>
                          <td><a href="{{
                                          route('activityid', [
                                                                'id' => $activity->activityid,
                                                                'name'=>$activity->activityDescription,
                                                                'acid'=>$activity->activityid,
                                                                'shortsname'=>$activity->shortName
                                                                ])
                                        }}" class="btn btn-xs btn-info"><i class="fa fa-fw fa-money"></i></a></td>
                          <td><label class="badge badge-success text-white">{{ $activity->activitydate }}</label></td>
                        </tr>
                        @endforeach
                      </tbody>
                      <tfoot style='font-size: 8pt;'>
                        <tr>
                          <th>Activity</th>
                          <th>Location</th>
                          <th>Program</th>
                          <th>Date | Start-End</th>
                          <th>Expenses</th>
                          <th>Date Created</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
              </div>
            </div>
        </div><!--end of col-md-8-->
    </div><!--end of row-->
</div><!--end of content-->

@endsection
