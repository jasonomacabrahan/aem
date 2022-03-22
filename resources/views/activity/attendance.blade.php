@extends('layouts.app', [
    'namePage' => 'ACTIVITY ATTENDANCE',
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
                <h2><i class="fa fa-fw fa-th-list"></i>Activities & Events Attendance</h2>
                {{-- <a href="/activity.reg" id="test" class="btn btn-success"><i class="fas fa-plus-circle"></i> New Registrant </a> --}}

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
                            <th>Name</th>
                            <th>Agency</th>
                            <th>Division</th>
                            <th>Date - Registered</th>
                            <th>Created@</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($activityattendances as $activityattendance)
                            <tr>
                                <td>{{  $activityattendance->name }}</td>
                                <td>{{  $activityattendance->agency }}</td>
                                <td>{{  $activityattendance->division }}</td>
                                <td>{{ $activityattendance->registrationDate }}</td>
                                <td>{{ $activityattendance->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot style='font-size: 8pt;'>
                        <tr>
                            <th>Name</th>
                            <th>Date - Regstered</th>
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

