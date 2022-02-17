@extends('layouts.app', [
    'namePage' => 'ACTIVITY LIST',
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
                <a href="activity.add" id="test" class="btn btn-success"><i class="fas fa-plus-circle"></i> New activity </a>
<!---                <a href="{{ '#' }}" class="btn btn-warning"><i class="fas fa-hand-holding"></i>Withdraw</a>
                <a href="{{ '#' }}" class="btn btn-primary pull-right  "><i class="fas fa-swatchbook"></i>Category</a>
                <a href="{{ '#' }}" class="btn btn-primary pull-right"><i class="fas fa-ruler"></i>Unit</a>
                <a href="{{ '#' }}" class="btn btn-primary pull-right"><i class="fas fa-people-carry"></i>Recipient</a> -->
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
                        @foreach($activitys as $activity)
                            <tr>
                                <td><a href="#" title="Update activity"></i>{{ $activity->activityDescription }}</a></td>
                                <td>{{ $activity->location }}</a></td>
                                <td>{{ $activity->activityDateStart }}</td>
                                <td>{{ $activity->activityDateEnd }}</td>
                                <td>{{ $programs[($activity->papID-1)]->shortName }}</td>
                                <td>{{ $activity->created_at }}</td>
                                <td>
                                    <a href="activity.attendance/{{ $activity->id }}"><i class="fa fa-fw fa-th-list"></i></i></a>

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

