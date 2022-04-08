@extends('layouts.app', [
    'namePage' => 'TASKS LIST',
    'class' => 'sidebar-mini',
    'activePage' => 'tasks',

])

@section('content')
  <div class="panel-header panel-header-sm">

  </div>
<div class="container-fluid">
    <div class="row">

      <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                <h2><i class="fa fa-fw fa-th-list"></i>Task Assignment</h2>
                <a href="{{ route('taskform')}}" class="btn btn-success"><i class="fas fa-plus-circle"></i> New Task </a>
              </div>
            <div class="card-body">
                <style>
                    table,th,td,tr,thead{
                        font-size: 10pt;!important;
                    }
                </style>
                 @if ($message = Session::get('success'))
                 <script>
                     swal("Success","...","success");
                 </script>
                @endif


                @if ($message = Session::get('error'))
                 <script>
                     swal("Oops","Something is wrong I cant Identify","error");
                 </script>
                @endif
                 <div class="table-responsive">
                     <table id="list" class="table table-striped table-hover table-bordered" style="width:100%">
                        <thead >
                            <tr style='font-size: 8pt; font-weight: bolder;'>
                                <th style='font-size: 8pt; font-weight: bolder;'>Program</th>
                                <th style='font-size: 8pt; font-weight: bolder;'>Task</th>
                                <th style='font-size: 8pt; font-weight: bolder;'>Tasked to</th>
                                <th style='font-size: 8pt; font-weight: bolder;'>Resolved</th>
                                <th style='font-size: 8pt; font-weight: bolder;'>Created@</th>
                                <th><i class="fa fa-fw fa-cog"></i>Option</th>
                            </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                            @if ($task->taskBy != $task->taskedTo)
                                <tr>
                                    <td>{{ $task->shortName }}</a></td>
                                    <td><a href="#" title="Update task"></i>{{ $task->taskDetail }}</a></td>
                                    <td>{{ $task->name}}</td>
                                    <td>
                                        @if ($task->taskResolved == 0)
                                            <span class="badge badge-danger text-white"><i class="fa-solid fa-circle-xmark"></i> No</span>    
                                        @endif
                                        @if ($task->taskResolved == 1)
                                            <span class="badge badge-success text-white"><i class="fa fa-fw fa-check-circle"></i>Yes</span>    
                                        @endif
                                        @if ($task->taskResolved == 2)
                                            <span class="badge badge-warning text-white"><i class="fa fa-fw fa-flag"></i>Progress</span>
                                        @endif
                                    </td>
                                    <td>{{ $task->assignmentdate }}</td>
                                    <td>
                                        @if ($task->name == auth()->user()->name)
                                    
                                        @else
                                            @if ($task->resolutionDetails==null)
                                            {{ $task->name}} is not responding.
                                            @else
                                                <a href="{{route('tasksresolutions', ['assignmentid'=>$task->taskID,'taskto'=>$task->taskedTo])}}" class="btn btn-info"><i class="fa-solid fa-reply"></i></a>
                                            @endif    
                                        @endif
                                        
                                    </td>
                                </tr>
                                
                            @endif
                                   
                            
                        @endforeach
                    </tbody>
                    <tfoot style='font-size: 8pt;'>
                        <tr>
                            <th style='font-size: 8pt; font-weight: bolder;'>Task</th>
                            <th style='font-size: 8pt; font-weight: bolder;'>Program</th>
                            <th style='font-size: 8pt; font-weight: bolder;'>Task to</th>
                            <th style='font-size: 8pt; font-weight: bolder;'>Resolved</th>
                            <th style='font-size: 8pt; font-weight: bolder;'>Created@</th>
                            <th><i class="fa fa-fw fa-cog"></i>Option</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            </div>
        </div><!--end of card-->
    </div>
    </div>
</div>
@endsection

