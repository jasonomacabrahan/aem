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
                <h2><i class="fa fa-fw fa-th-list"></i>Task Assignments</h2>
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
                     swal("Success","Task Addedd","success");
                 </script>
                @endif


                @if ($message = Session::get('error'))
                 <script>
                     swal("Oops","Something is wrong I cant Identify","error");
                 </script>
                @endif

                <table id="list" class="table table-striped table-hover table-bordered" style="width:100%">
                    <thead >
                        <tr style='font-size: 8pt;'>
                            <th>Task</th>
                            <th>Program</th>
                            <th>Source</th>
                            <th>Target</th>
                            <th>Resolved</th>
                            <th>Created@</th>
                            <th><i class="fa fa-fw fa-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <td><a href="#" title="Update task"></i>{{ $task->taskDetail }}</a></td>
                                <td>{{ $programs[($task->papID-1)]->shortName }}</a></td>
                                <td>{{ $task->taskBy }}</td>
                                <td>{{ $task->taskedTo }}</td>
                                <td>{{ $task->taskResolved }}</td>
                                <td>{{ $task->created_at }}</td>
                                <td>
                                    <a href="task.attendance/{{ $task->id }}"><i class="fa fa-fw fa-th-list"></i></i></a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot style='font-size: 8pt;'>
                        <tr>
                            <th>task</th>
                            <th>Location</th>
                            <th>Date - Start</th>
                            <th>Date - End</th>
                            <th>Program</th>
                            <th>Created@</th>
                            <th><i class="fa fa-fw fa-cog"></i></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div><!--end of card-->
      </div>
    </div>
</div>
@endsection

