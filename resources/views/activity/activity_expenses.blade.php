@extends('layouts.app', [
    'namePage' => 'ACTIVITY EXPENSES | ',
    'class' => 'sidebar-mini',
    'activePage' => 'activityexpenses',

])

@section('content')
  <div class="panel-header panel-header-sm">

  </div>
<div class="container-fluid">
    <div class="row">

      <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                
             
                <h2>
                    <i class="fa fa-fw fa-angle-right"></i>
                   
                        {{ $name }}- Events Expenses</h2>
                    
                <a href="{{ route('activitymanagement') }}" class="btn btn-danger"><i class="fa fa-fw fa-arrow-left"></i></a>        
                <a href="{{route('addexpense_new', ['id' => $act_id,'eventname'=>$name,'shortsname'=>$shortsname])}}" class="btn btn-info"><i class="fas fa-plus-circle"></i> New Expense </a>

              </div>
            <div class="card-body">
                <style>
                    table,th,td,tr,thead{
                        font-size: 10pt;!important;
                    }
                </style>
                 @if ($message = Session::get('successupdate'))
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
                                <tr style='font-size: 6pt;'>
                                    <th style='font-weight: bolder;'>Fuel & Lubricants</th>
                                    <th style='font-weight: bolder;'>Travel Per Diem</th>
                                    <th style='font-weight: bolder;'>Food & Accommodation</th>
                                    <th style='font-weight: bolder;'>Misc. Expense</th>
                                    <th style='font-weight: bolder;'>Activity Notes</th>
                                    <th style='font-weight: bolder;'>Date Added</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($expenses as $activityexpense)
                                    <tr>
                                        <td align="right">
                                            <a href="{{
                                                route('updateexpenses_new', [
                                                                      'id' => $activityexpense->id,
                                                                      ])
                                              }}" class=""><i class="fa fa-fw fa-edit"></i>{{ number_format($activityexpense->fuelLubricants,2) }}</a>
                                            
                                        </td>
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
                                    <th>Fuel & Lubricants</th>
                                    <th>Travel Per Diem</th>
                                    <th>Food & Accommodation</th>
                                    <th>Misc. Expense</th>
                                    <th>Activity Notes</th>
                                    <th>Date Added</th>
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

