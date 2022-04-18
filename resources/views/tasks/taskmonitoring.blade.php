@extends('layouts.app', [
    'namePage' => auth()->user()->name. ' - Tasks (*)',
    'class' => 'sidebar-mini',
    'activePage' => 'mytasks',
    'backgroundImage' => asset('assets') . "/img/logo.png",
])
@section('content')
  <div class="panel-header panel-header-sm">

  </div>
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
          <div class="card">
            <div class="card-header">
                <h2><i class="fa fa-fw fa-th-list"></i>Task Monitoring</h2>
            </div>
            <div class="card-body">
                <div class="card" style="user-select: auto;">
                    <div class="card-header" style="user-select: auto;">
                      <ul class="nav nav-tabs justify-content-center" role="tablist" style="user-select: auto;" id="myTab">
                            @can('monitortaskbyuser')
                                <li class="nav-item" style="user-select: auto;">
                                <a class="nav-link active" data-toggle="tab" href="#taskbyuser" role="tab" aria-selected="false" style="user-select: auto;">
                                    <i class="fa fa-fw fa-users" style="user-select: auto;"></i>
                                    Monitor task by User
                                </a>
                                </li>
                            @endcan
                            @can('taskbyproject')
                                <li class="nav-item" style="user-select: auto;">
                                <a class="nav-link" data-toggle="tab" href="#taskbyproject" role="tab" aria-selected="false" style="user-select: auto;">
                                    <i class="fa fa-fw fa-th-list" style="user-select: auto;"></i>
                                    Monitor task by Project 
                                </a>
                                </li>
                            @endcan
                          @can('yourproject')
                            <li class="nav-item" style="user-select: auto;">
                                <a class="nav-link" data-toggle="tab" href="#yourproject" role="tab" aria-selected="false" style="user-select: auto;">
                                <i class="fas fa-project-diagram"></i>
                                    Your Project
                                </a>
                            </li>
                          @endcan
                      </ul>
                    </div>
                  
                    <div class="card-body" style="user-select: auto;">
                    <!-- Tab panes -->
                    <div class="tab-content" style="user-select: auto;">
                        @can('monitortaskbyuser')     
                        <div class="tab-pane active" id="taskbyuser" role="tabpanel" style="user-select: auto;">
                            <div class="table table-responsive">
                                <table id="list" class="table table-striped table-hover table-bordered" style="width:100%">
                                   <thead >
                                   <tr>
                                       <th style='font-size: 9pt; font-weight: bold;'>Tasked to</th>
                                       <th style='font-size: 9pt; font-weight: bold;'>Number of tasks Assigned</th>
                                       <th style='font-size: 9pt; font-weight: bold;'>Date Created</th>
                                       <th style='font-size: 9pt; font-weight: bold;'>Date Updated</th>
                                       <th style='font-size: 9pt; font-weight: bold;'>Option(s)</th>
                                       
                                    </tr>
                               </thead>
                               <tbody>
                                   @foreach($users as $user)
                                        <tr>
                                            <td>
                                                @php
                                                    $data = App\Models\User::Select('name')->where('id',$user->taskedTo)->get();
                                                    @endphp
                                                @foreach($data as $element)
                                                {{ $element->name ?? '' }}
                                                @endforeach
                                                
                                                
                                            </td>
                                            <td>
                                                <a href="{{ route('usertask',['taskid'=>$user->taskid,'userid'=>$user->taskedTo])}}" class="btn btn-info rounded-0"><strong>{{ $user->numcount }}</strong></a>
                                            </td>
                                            <td>{{ $user->assignmentdate }}</td>
                                            <td>N/A</td>
                                            <td>N/A</td>
                                        </tr>
                                   @endforeach
                                </tbody>
                               <tfoot style='font-size: 8pt;'>
                                <tr style='font-size: 8pt;'>
                                    <th style='font-size: 9pt; font-weight: bold;'>Task by</th>
                                    <th style='font-size: 9pt; font-weight: bold;'>Number of tasks Assigned</th>
                                    <th style='font-size: 9pt; font-weight: bold;'>Date Created</th>
                                    <th style='font-size: 9pt; font-weight: bold;'>Date Updated</th>
                                    <th style='font-size: 9pt; font-weight: bold;'>Option(s)</th>
                                </tr>
                            </tfoot>
                        </table>
                           
                    </div>
                </div>
                @endcan
                <div class="tab-pane" id="taskbyproject" role="tabpanel" style="user-select: auto;">
                            <table id="list1" class="table table-striped table-hover table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th style='font-size: 9pt; font-weight: bold;'>Shortname</th>
                                    <th style='font-size: 9pt; font-weight: bold;'>Description</th>
                                    <th style='font-size: 9pt; font-weight: bold;'>Number of Task</th>
                                    <th style='font-size: 9pt; font-weight: bold;'>Focal</th>
                                    <th style='font-size: 9pt; font-weight: bold;'>Date Created</th>
                                    <th style='font-size: 9pt; font-weight: bold;'>Date Updated</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($project as $proj)
                                    <tr>
                                        <td>{{ $proj->shortName }}</td>
                                        <td>{{ $proj->programDescription }}</td>
                                        <td>
                                            @php
                                                $data = App\Models\TaskAssignment::where('papID',$proj->papID)->get();
                                            @endphp
                                            <a href="{{ route('taskperproject',$proj->programid) }}" class="btn btn-xs btn-info rounded-0">{{ count($data) ?? '' }}</a>
                                        </td>
                                        <td>
                                            @php
                                                $data = App\Models\User::Select('name')->where('id',$proj->focalPerson)->get();
                                            @endphp
                                            @foreach($data as $element)
                                                {{ $element->name ?? '' }}
                                            @endforeach
                                            
                                        </td>
                                        <td>{{ $proj->created_at }}</td>
                                        <td>{{ $proj->updated_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot style='font-size: 8pt;'>
                                <tr style='font-size: 8pt;'>
                                    <th style='font-size: 9pt; font-weight: bold;'>Shortname</th>
                                    <th style='font-size: 9pt; font-weight: bold;'>Description</th>
                                    <th style='font-size: 9pt; font-weight: bold;'>Tasks #</th>
                                    <th style='font-size: 9pt; font-weight: bold;'>Focal</th>
                                    <th style='font-size: 9pt; font-weight: bold;'>Date Created</th>
                                    <th style='font-size: 9pt; font-weight: bold;'>Date Updated</th>
                                </tr>
                            </tfoot>
                        </table>
                        </div>
                        <div class="tab-pane" id="yourproject" role="tabpanel" style="user-select: auto;">
                            <table id="list2" class="table table-striped table-hover table-bordered" style="width:100%">
                                <thead >
                                    <tr style='font-size: 8pt;'>
                                        <th style='font-weight: bolder;'>Short Name</th>
                                        <th style='font-weight: bolder;'>Description</th>
                                        <th style='font-weight: bolder;'>Date Created</th>
                                        <th style='font-weight: bolder;'>Date Updated</th>
                                        <th style='font-weight: bolder;'><i class="fa fa-fw fa-cog"></i>Option(s)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($programs as $program)
                                        <tr>
                                            <td>{{ $program->shortName }}</td>
                                            <td>{{ $program->programDescription }}</a></td>
                                            <td>{{ $program->programcreated }}</td>
                                            <td>{{ $program->programupdated }}</td>
                                            <td>

                                                @if ($program->taskid == null)
                                                    
                                                    No task Created
                                                @else
                                                    
                                                    <a href="{{ route('createdtask', $program->taskid) }}" class="btn btn-xs btn-info"><i class="fa-solid fa-list-check"></i>Created Task(s)</a>
                                                    
                                                @endif
            
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot style='font-size: 8pt;'>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Date Created</th>
                                        <th>Date Updated</th>
                                        <th><i class="fa fa-fw fa-cog"></i>Option(s)</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        
                      </div>
                    </div>
                  </div>                 
            </div>
        </div><!--end of card-->
      </div>
    </div>
</div>
@endsection

