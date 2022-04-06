@extends('layouts.app', [
    'namePage' => 'ACTIVITY ATTENDANCE',
    'class' => 'sidebar-mini',
    'activePage' => 'usertrainings',

])

@section('content')
  <div class="panel-header panel-header-sm">

  </div>
<div class="container-fluid">
    <div class="row">

      <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                <h2><i class="fa fa-fw fa-th-list"></i>Activities & Events Registered</h2>
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

                <div class="row">
                    <div class="card-body">
                      <div class="card-content">
                        <table id="list" class="table table-striped table-hover table-bordered" style="width:100%">
                            <thead >
                                <tr style='font-size: 8pt;'>
                                    <th style='font-weight: bolder;'>Training</th>
                                    <th style='font-weight: bolder;'>Location</th>
                                    <th style='font-weight: bolder;'>Start Date</th>
                                    <th style='font-weight: bolder;'>End Date</th>
                                    <th style='font-weight: bolder;'>Program</th>
                                    <th style='font-weight: bolder;'>Program Description</th>
                                    <th style='font-weight: bolder;'>Focal Person</th>
                                    <th style='font-weight: bolder;'><i class="fa fa-fw fa-cog"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($activityattendances as $activityattendance)
                                    <tr>
                                        <td>{{ $activityattendance->activityDescription }}</td>
                                        <td>{{ $activityattendance->location }}</td>
                                        <td>{{ $activityattendance->activityDateStart }}</td>
                                        <td>{{ $activityattendance->activityDateEnd }}</td>
                                        <td>{{ $activityattendance->shortName }}</td>
                                        <td>{{ $activityattendance->programDescription }}</td>
                                        <td>{{ $activityattendance->name }}</td>
                                        <td>
                                            <a href="{{ route('activity', ['id' => $activityattendance->ActivityID])  }}"><i class="fa fa-fw fa-th-list"></i></i></a>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot style='font-size: 8pt;'>
                                <tr>
                                    <th>Training</th>
                                    <th>Location</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Program</th>
                                    <th>Program Description</th>
                                    <th>Focal Person</th>
                                    <th><i class="fa fa-fw fa-cog"></i></th>
                                </tr>
                            </tfoot>
                        </table>
                      </div>
                    </div>
                </div>


            </div>
        </div><!--end of card-->
      </div>
    </div>
</div>
@endsection

