@extends('layouts.app', [
    'namePage' => 'List of Participants - ',
    'class' => 'sidebar-mini',
    'activePage' => 'activitys',

])

@section('content')
  <div class="panel-header panel-header-sm">

  </div>
<div class="container-fluid">
    <div class="row">

      <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                <h2><i class="fa fa-fw fa-th-list"></i>Events Attendance</h2>
                @foreach ($activity as $activities)@endforeach
                
                @foreach ($user as $item)@endforeach
                    @if ($item->title=="Focal")
                        
                        <a href="{{ route('activitymanagement') }}" class="btn btn-info"><i class="fa fa-fw fa-arrow-left"></i>Go back to Activities</a>
                        
                    @else
                        
                        <a href="{{ route('activity.index') }}" class="btn btn-info"><i class="fa fa-fw fa-arrow-left"></i>Go back to Activities</a>
                        
                    @endif
                    <div class="alert alert-info rounded-0">
                
                        <h5>Activity Description: {{ $activities->activityDescription}}</h5>
                    </div>

                
                
              </div>
            <div class="card-body">
                <style>
                    table,th,td,tr,thead{
                        font-size: 10pt;!important;
                    }
                </style>
                 @if ($message = Session::get('success'))
                 <script>
                     swal("Success","Changes Saved","success");
                 </script>
                @endif


                @if ($message = Session::get('error'))
                 <script>
                     swal("Oops","Something is wrong I cant Identify","error");
                 </script>
                @endif
                @can('gad')
                 <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header bg-warning">
                                <label class="text-white"><i class="fa fa-fw fa-users"></i>Number of Participants</label>
                            </div>
                            <div class="card-body">
                                {{ $participants }}
                            </div>
        
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header bg-success">
                                <label class="text-white"><i class="fa fa-fw fa-male"></i>Number of Male participants</label>
                            </div>
                            <div class="card-body">
                                {{ $male }}
                            </div>
        
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header bg-info">
                                <label class="text-white"><i class="fa fa-fw fa-female"></i>Number of Female participants</label>
                            </div>
                            <div class="card-body">
                                {{ $female }}
                            </div>
        
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header bg-primary">
                                <label class="text-white">Other Gender</label>
                            </div>
                            <div class="card-body">
                                Custom : {{ $custom }}, 
                                Rather not Say : {{ $rathernotsay }}<br>
                            </div>
                        </div>
                    </div>
                 </div>
                 @endcan



                <table id="list" class="table table-striped table-hover table-bordered" style="width:100%">
                    <thead >
                        <tr>
                            <th style='font-size: 8pt; font-weight: bolder;'>Name</th>
                            <th style='font-size: 8pt; font-weight: bolder;'>Gender</th>
                            <th style='font-size: 8pt; font-weight: bolder;'>Agency</th>
                            <th style='font-size: 8pt; font-weight: bolder;'>Division</th>
                            @can('useradditionalinfo')
                            <th style='font-size: 8pt; font-weight: bolder;'>Phone #</th>
                            <th style='font-size: 8pt; font-weight: bolder;'>Email </th>
                            @endcan
                            <th style='font-size: 8pt; font-weight: bolder;'>Date - Registered</th>
                            <th style='font-size: 8pt; font-weight: bolder;'>Create @</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($activityattendances as $activityattendance)
                            <tr>
                                <td>{{  $activityattendance->name }}</td>
                                <td>
                                    @if ($activityattendance->sex==0)
                                        Male    
                                    @endif
                                    @if ($activityattendance->sex==1)
                                        Female    
                                    @endif
                                    @if ($activityattendance->sex==2)
                                        Rather Not Say
                                    @endif
                                    @if ($activityattendance->sex==3)
                                        Custom
                                    @endif
                                    
                                </td>
                                <td>{{  $activityattendance->agency }}</td>
                                <td>{{  $activityattendance->division }}</td>
                                @can('useradditionalinfo')
                                <td>{{  $activityattendance->contactNumber }}</td>
                                <td>{{  $activityattendance->email }}</td>
                                @endcan
                                <td>{{ $activityattendance->registrationDate }}</td>
                                <td>{{ $activityattendance->attendancedate }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot style='font-size: 8pt;'>
                        <tr>
                            <th style='font-size: 8pt; font-weight: bolder;'>Name</th>
                            <th style='font-size: 8pt; font-weight: bolder;'>Gender</th>
                            <th style='font-size: 8pt; font-weight: bolder;'>Agency</th>
                            <th style='font-size: 8pt; font-weight: bolder;'>Division</th>
                            @can('useradditionalinfo')
                            <th style='font-size: 8pt; font-weight: bolder;'>Phone #</th>
                            <th style='font-size: 8pt; font-weight: bolder;'>Email </th>
                            @endcan
                            <th style='font-size: 8pt; font-weight: bolder;'>Date - Registered</th>
                            <th style='font-size: 8pt; font-weight: bolder;'>Create @</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div><!--end of card-->
      </div>
    </div>
</div>
@endsection

