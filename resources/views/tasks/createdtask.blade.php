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
                <h2><i class="fa fa-fw fa-th-list"></i>Task Per Project</h2>
                <a href="{{ route('taskmonitoring') }}" class="btn btn-info"><i class="fa fa-fw fa-arrow-left"></i>Go Back</a>
                
            </div>
            <div class="card-body">
                
                <style>
                    table,th,td,tr,thead{
                        font-size: 10pt;!important;
                    }
                </style>

                 @if ($message = Session::get('success'))
                 <script>
                     swal("Success","Response Added","success");
                 </script>
                @endif
                 @if ($message = Session::get('createsuccess'))
                 <script>
                     swal("Success","Task Added","success");
                 </script>
                @endif

                @if ($message = Session::get('ok'))
                 <script>
                     swal("Success","Changes Saved...","success");
                 </script>
                @endif

                @if(Session::has('status-success'))
                    <div class="alert alert-success">
                        {{Session::get('status-success')}}
                    </div>
                @endif


                @if ($message = Session::get('error'))
                 <script>
                     swal("Oops","Something is wrong I cant Identify","error");
                 </script>
                @endif
                 <div class="table table-responsive">
                     <table id="list" class="table table-striped table-hover table-bordered" style="width:100%">
                        <thead >
                        <tr>
                            <th style='font-size: 9pt; font-weight: bold;'>Task Detail</th>
                            <th style='font-size: 9pt; font-weight: bold;'>Program</th>
                            <th style='font-size: 9pt; font-weight: bold;'>Source</th>
                            <th style='font-size: 9pt; font-weight: bold;'>Resolved</th>
                            <th style='font-size: 9pt; font-weight: bold;'>Created@</th>
                            <th style='font-size: 9pt; font-weight: bold;'><i class="fa fa-fw fa-cog"></i></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($createdtasks as $tasks)
                            <tr>
                                <td>{{ $tasks->taskDetail}}</td>
                                <td>{{ $tasks->shortName}}</td>
                                <td>{{ auth()->user()->name }}(me)</td>
                                <td>
                                    @if ($tasks->isresolved==0)
                                        No
                                    @endif
                                    @if ($tasks->isresolved==1)
                                        Yes
                                    @endif
                                    @if ($tasks->isresolved==2)
                                        Progress
                                    @endif
                                </td>
                                <td>{{ $tasks->datecreated}}</td>
                                <td>{{ $tasks->datecreated}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot style='font-size: 8pt;'>
                        <tr style='font-size: 8pt;'>
                            <th>Task Detail</th>
                            <th>Program</th>
                            <th>Source</th>
                            <th>Resolved</th>
                            <th>Created@</th>
                            <th><i class="fa fa-fw fa-cog"></i></th>
                            
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

