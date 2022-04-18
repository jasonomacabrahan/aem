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
                
                @if ($message = Session::get('successexpenses'))
                <script>
                    swal("Success","Expenses Added","success");
                </script>
                @endif

                @if ($message = Session::get('indexsuccess'))
                 <script>
                     swal("Success","New Activity Added","success");
                 </script>
                @endif



                @if ($message = Session::get('error'))
                 <script>
                     swal("Oops","Something is wrong I cant Identify","error");
                 </script>
                @endif
                <ul class="nav nav-tabs justify-content-center" role="tablist" style="user-select: auto;" id="myTab">
                    <li class="nav-item" style="user-select: auto;">
                        <a class="nav-link active" data-toggle="tab" href="#activities" role="tab" aria-selected="false" style="user-select: auto;">
                            <i class="fas fa-skating"></i>
                            Activities
                        </a>
                    </li>
                    <li class="nav-item" style="user-select: auto;">
                        <a class="nav-link" data-toggle="tab" href="#expenses" role="tab" aria-selected="false" style="user-select: auto;">
                            <i class="fa fa-fw fa-money" style="user-select: auto;"></i>
                            Expenses 
                        </a>
                    </li>
                    
                </ul>
                <div class="tab-content" style="user-select: auto;">
                    <div class="tab-pane active" id="activities" role="tabpanel" style="user-select: auto;">
                        <h2><i class="fa fa-fw fa-th-list"></i>Activities
                        </h2>
                        <a href="{{ route('newactivity') }}" id="test" class="btn btn-info rounded-0"><i class="fas fa-plus-circle"></i> New activity </a>
                        
                        <br>
                        <br>
                        <table class="table table-striped table-hover table-bordered listactivities" style="width:100%">
                            <thead>
                                <tr>
                                    <th style='font-size: 8pt; font-weight: bolder;'>Activity</th>
                                    <th style='font-size: 8pt; font-weight: bolder;'>Location</th>
                                    <th style='font-size: 8pt; font-weight: bolder;'>Date - Start</th>
                                    <th style='font-size: 8pt; font-weight: bolder;'>Date - End</th>
                                    <th style='font-size: 8pt; font-weight: bolder;'>Program</th>
                                    <th style='font-size: 8pt; font-weight: bolder;'>Created@</th>
                                    <th style='font-size: 8pt; font-weight: bolder;'><i class="fa fa-fw fa-cog"></i></th>
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
                                        <td>{{ $program->activitydatecreated }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-1">
                                                    
                                                        <?php $encid = Crypt::encrypt($program->activityid); ?>
                                                        @if (strtotime(date('Y-m-d'))>strtotime($program->activityDateEnd) )
                                                        
                                                        @else
                                                        <a href="{{ route('attendance',[
                                                            'activityid'=>$encid,
                                                            'realid'=>$program->activityid,
                                                            ]
                                                            )}}" class="btn btn-info btn-sm rounded-0" data-toggle="tooltip" data-placement="top" title="Click to see generated link"><i class="fa fa-fw fa-link"></i></a>
                                                        &nbsp;
                                                         @endif
                                                    
                                                </div>
                                                <div class="col-md-1"></div>
                                                <div class="col-md-1">
                                                        
                                                        <a href="{{route('activity', ['id' => $program->activityid])}}" class="btn btn-info btn-sm rounded-0"  data-toggle="tooltip" data-placement="top" title="Click to see List of Participant"><i class="fa fa-fw fa-th-list"></i></a>

                                                    
                                                </div>

                                            </div>
                                            
        
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th style='font-size: 8pt; font-weight: bolder;'>Activity</th>
                                    <th style='font-size: 8pt; font-weight: bolder;'>Location</th>
                                    <th style='font-size: 8pt; font-weight: bolder;'>Date - Start</th>
                                    <th style='font-size: 8pt; font-weight: bolder;'>Date - End</th>
                                    <th style='font-size: 8pt; font-weight: bolder;'>Program</th>
                                    <th style='font-size: 8pt; font-weight: bolder;'>Created@</th>
                                    <th style='font-size: 8pt; font-weight: bolder;'><i class="fa fa-fw fa-cog"></i></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="tab-pane" id="expenses" role="tabpanel" style="user-select: auto;">
                        <h2><i class="fa fa-fw fa-th-list"></i>Expenses</h2>
                        <a href="./activity.addexpense" id="test" class="btn btn-info"><i class="fas fa-plus-circle"></i> New Expense </a>
                        <br>
                        <br>
                        <table class="table table-striped table-hover table-bordered listexpenses" style="width:100%">
                            <thead >
                                <tr style='font-size: 6pt;'>
                                    <th style='font-weight: bolder;'>Activity / Event </th>
                                    <th style='font-weight: bolder;'>Program</th>
                                    <th style='font-weight: bolder;'>Fuel & Lubricants</th>
                                    <th style='font-weight: bolder;'>Travel Per Diem</th>
                                    <th style='font-weight: bolder;'>Food & Accommodation</th>
                                    <th style='font-weight: bolder;'>Misc. Expense</th>
                                    <th style='font-weight: bolder;'>Activity Notes</th>
                                    <th style='font-weight: bolder;'>Created@</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($activityexpenses as $activityexpense)
                                    <tr>
                                        <td><a href="updateexpenses/{{ $activityexpense->id }}">{{ $activityexpense->activityDescription }}<i class="fa-solid fa-fw fa-pen-to-square"></i></a></td>
                                        <td>{{ $activityexpense->shortName }}</td>
                                        <td align="right">{{ number_format($activityexpense->fuelLubricants,2) }}</td>
                                        <td align="right">{{ number_format($activityexpense->travelPerDiem,2) }}</td>
                                        <td align="right">{{ number_format($activityexpense->foodAccommodation,2) }}</td>
                                        <td align="right">{{ number_format($activityexpense->miscExpense,2) }}</td>
                                        <td>{{ $activityexpense->activityNotes }}</td>
                                        <td>{{ $activityexpense->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot style='font-size: 8pt;'>
                                <tr>
                                    <th>Activity / Event </th>
                                    <th>Program</th>
                                    <th>Fuel & Lubricants</th>
                                    <th>Travel Per Diem</th>
                                    <th>Food & Accommodation</th>
                                    <th>Misc. Expense</th>
                                    <th>Activity Notes</th>
                                    <th>Created@</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                
                
            </div>
        </div><!--end of card-->
      </div>
    </div>
</div>
@endsection

