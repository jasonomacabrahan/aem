@extends('layouts.app', [
    'namePage' => 'ACTIVITY EXPENSES',
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
                <h2><i class="fa fa-fw fa-th-list"></i>Activities / Events Expenses - </h2>
                <a href="./activity.addexpense" id="test" class="btn btn-success"><i class="fas fa-plus-circle"></i> New Expense </a>
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
                        <table id="list" class="table table-striped table-hover table-bordered" style="width:100%">
                            <thead >
                                <tr style='font-size: 8pt;'>
                                    <th>Activity / Event </th>
                                    <th>Program</th>
                                    <th>Fuel & Lubricants</th>
                                    <th>Travel Per Diem</th>
                                    <th>Food & Accommodation</th>
                                    <th>Misc. Expense</th>
                                    <th>Activity Notes</th>
                                    <th>Created@</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($activityexpenses as $activityexpense)
                                    <tr>
                                        <td>{{ $activityexpense->activityDescription }}</td>
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


            </div>
        </div><!--end of card-->
      </div>
    </div>
</div>
@endsection

