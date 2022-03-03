@extends('layouts.app', [
    'namePage' => 'my tasks LIST',
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
                <h2><i class="fa fa-fw fa-th-list"></i>My Tasks Assignments</h2>
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


                @if ($message = Session::get('error'))
                 <script>
                     swal("Oops","Something is wrong I cant Identify","error");
                 </script>
                @endif

                <table id="list" class="table table-striped table-hover table-bordered" style="width:100%">
                    <thead >
                        <tr style='font-size: 8pt;'>
                            <th>Task Detail</th>
                            <th>Program</th>
                            <th>Source</th>
                            <th>Response</th>
                            <th>Resolved</th>
                            <th>Created@</th>
                            <th><i class="fa fa-fw fa-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mytasks as $mytask)
                            <tr>
                                <td>{{ $mytask->taskDetail }}</a></td>
                                <td>{{ $mytask->shortName }}</a></td>
                                <td>{{ $mytask->name }}</td>
                                <td><a href="#" title="Edit response"><i class="fa fa-fw fa-edit"></i>{{ $mytask->resolutionDetails }}</a></td>
                                <td>
                                    @if ($mytask->taskResolved==0)
                                            {{ "No" }}
                                                
                                    @else
                                            {{ "Yes" }}            
                                            
                                    @endif
                                </td>
                                <td>{{ $mytask->created_at }}</td>
                                <td>
                                    <a href="{{ route('respond', ['id' => $mytask->taskid])  }}"><i class="fa-solid fa-reply"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot style='font-size: 8pt;'>
                        <tr style='font-size: 8pt;'>
                            <th>Task Detail</th>
                            <th>Program</th>
                            <th>Source</th>
                            <th>Response</th>
                            <th>Resolved</th>
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

