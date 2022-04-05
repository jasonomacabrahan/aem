
<div class="container-fluid">
    <div class="row">

      <div class="col-md-12">
          <div class="card">
              
            <div class="card-body">
                
                 <div class="table-responsive">
                     <table border="1">
                        <thead >
                            <tr style='font-size: 8pt; font-weight: bolder;'>
                            <th style='font-size: 8pt; font-weight: bolder;'>Assignment ID</th>
                            <th style='font-size: 8pt; font-weight: bolder;'>Resolution</th>
                            <th style='font-size: 8pt; font-weight: bolder;'>User ID</th>
                            <th style='font-size: 8pt; font-weight: bolder;'>Verified By</th>
                            <th style='font-size: 8pt; font-weight: bolder;'>Created at</th>
                            <th style='font-size: 8pt; font-weight: bolder;'>Update at</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($responses as $task)
                        <tr>
                            <td>{{ $task->taskAssignmentID }}</a></td>
                            <td>{{ $task->resolutionDetails }}</a></td>
                            <td>{{ $task->userID}}</td>
                            <td>{{ $task->verifiedBy}}</td>
                            <td>{{ $task->created_at}}</td>
                            <td>{{ $task->updated_at}}</td>
                            <td>
                                <a href="{{route('delete', ['id' => $task->id])}}">Delete</a>
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th style='font-size: 8pt; font-weight: bolder;'>Assignment ID</th>
                            <th style='font-size: 8pt; font-weight: bolder;'>Resolution</th>
                            <th style='font-size: 8pt; font-weight: bolder;'>User ID</th>
                            <th style='font-size: 8pt; font-weight: bolder;'>Verified By</th>
                            <th style='font-size: 8pt; font-weight: bolder;'>Created at</th>
                            <th style='font-size: 8pt; font-weight: bolder;'>Update at</th>
                            <th>Option</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            </div>
        </div><!--end of card-->
    </div>
    </div>
</div>

