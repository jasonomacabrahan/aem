@extends('layouts.app', [
    'namePage' => auth()->user()->name. ' - Tasks (*)',
    'class' => 'sidebar-mini',
    'activePage' => 'mytasks',
    'backgroundImage' => asset('assets') . "/img/logo.png",
])

@section('content')
  <div class="panel-header panel-header-sm">

  </div>
<div class="container-fluid">
    <div class="row">

      <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                <h2><i class="fa fa-fw fa-th-list"></i>My Tasks Assignments</h2>
                <a href="{{ route('taskform') }}" class="btn btn-info"><i class="fa fa-fw fa-plus"></i>New Task</a>
              </div>
            <div class="card-body">
                <style>
                    table,th,td,tr,thead{
                        font-size: 10pt;!important;
                    }
                </style>
                 @if ($message = Session::get('success'))
                 <script>
                     swal("Success","Response Added","success");
                 </script>
                @endif

                @if ($message = Session::get('ok'))
                 <script>
                     swal("Success","Changes Saved...","success");
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
                            <th>Source</th>
                            <th>Response</th>
                            <th>Resolved</th>
                            <th>Created@</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mytasks as $mytask)
                            <tr>
                                <td>
                                    <?php
                                        $source = $mytask->thesource; 
                                        $user = auth()->user()->name;
                                        if($user==$source AND $mytask->taskResolved==0)
                                        {
                                            ?>
                                                <a href="{{ route('editmytask', ['id' => $mytask->taskid])  }}"><i class="fa fa-fw fa-edit"></i><?php echo $mytask->taskDetail ?></a>
                                            <?php
                                        }else{
                                                echo $mytask->taskDetail;
                                           
                                        }
                                    ?>
                                </td>
                                <td>{{ $mytask->shortName }}</td>
                                <td>

                                    <?php 
                                        $source = $mytask->thesource; 
                                        $user = auth()->user()->name;
                                        if ($user==$source) {
                                            echo $source;
                                        }else{
                                            echo $source;
                                        }
                                    ?>
                                             
                                        
                                </td>
                                <td>
                                    <?php
                                        if($mytask->taskResolved==0)
                                        {
                                            if ($mytask->resolutionDetails==NULL) {
                                                ?>
                                                    <a href="{{ route('respond', ['id' => $mytask->resolutionId])  }}" class="btn btn-info btn-xs"><i class="fa-solid fa-reply"></i></a>
                                                    <?php
                                            }else{
                                                ?>
                                                    <a href="{{route('editmyresponse', ['id' => $mytask->resolutionId])}}" title="Edit response"><i class="fa fa-fw fa-edit"></i>{{ $mytask->resolutionDetails }}</a>
                                                    <?php
                                            }
                                        }else{
                                            
                                            echo $mytask->resolutionDetails;

                                            
                                        }    

                                    ?>
                                </td>
                                <td>
                                    @if ($mytask->taskResolved==0)
                                            {{ "No" }}
                                                
                                    @else
                                            {{ "Yes" }}            
                                            
                                    @endif
                                </td>
                                <td>{{ $mytask->datecreated }}</td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot style='font-size: 8pt;'>
                        <tr style='font-size: 8pt;'>
                            <th>Task Detail</th>
                            <th>Program</th>
                            <th>Source</th>
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

