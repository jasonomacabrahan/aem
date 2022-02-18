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
                <a href="/activity.reg" id="test" class="btn btn-success"><i class="fas fa-plus-circle"></i> New Registrant </a>
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

                <div class="row">
                    <div class="card-body">
                      <div class="card-content">
                        <table id="list" class="table table-responsive" style="width:100%">
                            <tr>
                                <td><label for="Location">{{__(" Activity / Event ")}}</label></td>
                                <td>{{ $activityattendances[0]->activityDescription }}</td>
                            </tr>
                            <tr>
                                <td><label for="Location">{{__(" Location / Venue ")}}</label>
                                </td>
                                <td>
                                    {{ $activityattendances[0]->location }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="DateStart">{{__(" Activity Duration ")}}</label>
                                </td>
                                <td>
                                    {{ $activityattendances[0]->activityDateStart }} to
                                        {{ $activityattendances[0]->activityDateEnd }}

                                </td>
                            </tr>
                            <tr>
                                <td><label for="Program">{{__(" Program / Project ")}}</label></td>
                                <td>{{ $activityattendances[0]->shortName }} - {{ $activityattendances[0]->programDescription }}</td>
                            </tr>

                      </div>
                    </div>
                </div>

                <table id="list" class="table table-striped table-hover table-bordered" style="width:100%">
                    <thead >
                        <tr style='font-size: 8pt;'>
                            <th>Name</th>
                            <th>Agency</th>
                            <th>Division</th>
                        @if (auth()->user()->usertype == 'admin')
                            <th>Designation</th>
                            <th>Contact Number</th>
                            <th>eMail</th>
                            <th>Sex</th>
                        @endif
                            <th>Date - Registered</th>
                            <th>Created@</th>
                            <th><i class="fa fa-fw fa-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($activityattendances as $activityattendance)
                            <tr>
                                <td>{{  $activityattendance->name }}</td>
                                <td>{{  $activityattendance->agency }}</td>
                                <td>{{  $activityattendance->division }}</td>
                            @if (auth()->user()->usertype == 'admin')
                                <td>{{  $activityattendance->designation }}</td>
                                <td>{{  $activityattendance->contactNumber }}</td>
                                <td>{{  $activityattendance->email }}</td>
                                <td>{{  (($activityattendance->sex==0)?'Male':'Female') }}</td>
                            @endif
                                <td>{{ $activityattendance->registrationDate }}</td>
                                <td>{{ $activityattendance->created_at }}</td>
                                <td>
                                    <a href="#"><i class="fa fa-fw fa-th-list"></i></i></a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot style='font-size: 8pt;'>
                        <tr>
                            <th>Name</th>
                            <th>Date - Regstered</th>
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

