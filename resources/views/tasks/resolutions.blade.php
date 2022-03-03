@extends('layouts.app', [
    'namePage' => 'RESOLUTIONS LIST',
    'class' => 'sidebar-mini',
    'activePage' => 'Resolutions',

])

@section('content')
  <div class="panel-header panel-header-sm">

  </div>
<div class="container-fluid">
    <div class="row">

      <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                <h2><i class="fa fa-fw fa-th-list"></i>Assignment Resolutions</h2>
                {{-- <a href="tasks.resolutions/{{ auth()->user()->id  }}" class="btn btn-success"><i class="fas fa-plus-circle"></i> New response </a> --}}
              </div>
            <div class="card-body">
                <style>
                    table,th,td,tr,thead{
                        font-size: 10pt;!important;
                    }
                </style>
                 @if ($message = Session::get('success'))
                 <script>
                     swal("Success","response Addedd","success");
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
                            <th>Tasked To</th>
                            <th>Response</th>
                            <th>Resolved</th>
                            <th>Created@</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($responses as $response)
                            <tr>
                                <td><a href="#" title="Update response"></i>{{ $response->taskDetail }}</a></td>
                                <td>{{ $response->shortName }}</a></td>
                                <td>{{ $response->name }}</td>
                                <td>{{ $response->resolutionDetails }}</td>
                                <td>
                                    @if ($response->taskResolved==0)
                                        <a href="{{ route('markasresolved', ['id' => $response->taskID]) }}"><i class="fa fa-fw fa-edit"></i>NO</a>
                                        
                                        @else
                                        <a href="{{ route('markasresolved', ['id' => $response->taskID]) }}"><i class="fa fa-fw fa-edit"></i>YES</a>
                                        
                                    @endif
                                </td>
                                <td>{{ $response->created_at }}</td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot style='font-size: 8pt;'>
                        <tr>
                            <th>Task Detail</th>
                            <th>Program</th>
                            <th>Tasked To</th>
                            <th>Response</th>
                            <th>Resolved</th>
                            <th>Created@</th>
                           
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div><!--end of card-->
      </div>
    </div>
</div>
@endsection

