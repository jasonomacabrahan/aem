@extends('layouts.app', [
    'namePage' => 'ACTIVITY LIST | ',
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
                <h2><i class="fa fa-fw fa-th-list"></i>Activities & Events</h2>
                <a href="{{ route('newactivity') }}" id="test" class="btn btn-success"><i class="fas fa-plus-circle"></i> New activity </a>
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

                <table id="list" class="table table-striped table-hover table-bordered" style="width:100%">
                    <thead >
                        <tr style='font-size: 8pt;'>
                            <th>Activity</th>
                            <th>Location</th>
                            <th>Date - Start</th>
                            <th>Date - End</th>
                            <th>Program</th>
                            <th>Created@</th>
                            <th><i class="fa fa-fw fa-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($programs as $program)
                            <tr>
                                <td><a href="{{route('editactivity', ['id' => $program->activityid])}}" title="Update activity"><i class="fa fa-fw fa-edit"></i>{{ $program->activityDescription }}</a></td>
                                <td>{{ $program->location }}</a></td>
                                <td>{{ $program->activityDateStart }}</td>
                                <td>{{ $program->activityDateEnd }}</td>
                                <td>{{ $program->shortName }}</td>
                                <td>{{ $program->created_at }}</td>
                                <td>
                                    <a href="{{route('activity', ['id' => $program->activityid])}}"><i class="fa fa-fw fa-th-list"></i></i></a>
                                    

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot style='font-size: 8pt;'>
                        <tr>
                            <th>Activity</th>
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

