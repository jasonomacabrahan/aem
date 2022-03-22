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
                 <div class="table table-responsive">

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
                                        if($user==$source AND $mytask->isverified==0)
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
                                        if($mytask->isverified==0)
                                        {
                                            if ($mytask->resolutionDetails==NULL) {
                                                ?>
                                                    <a href="{{ route('respond', ['id' => $mytask->resoid])  }}" class="btn btn-info btn-xs"><i class="fa-solid fa-reply"></i></a>
                                                    <?php
                                            }else{
                                                ?>
                                                    <a href="{{route('editmyresponse', ['id' => $mytask->resoid])}}" title="Edit response"><i class="fa fa-fw fa-edit"></i>{{ $mytask->resolutionDetails }}</a>
                                                    <?php
                                            }
                                        }else{
                                            
                                            echo $mytask->resolutionDetails;

                                            
                                        }    

                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        $source = $mytask->thesource; 
                                        $user = auth()->user()->name;
                                        if ($user==$source) {
                                            if($mytask->resolutionDetails==NULL){

                                            }else{
                                                if($mytask->isverified==0)
                                                {
                                                    ?>
                                                        <a href="{{route('tasksresolutions', ['id' => $mytask->resoid])}}" class="btn btn-xs btn-info" title="mark as resolved"><i class="fa fa-fw fa-check-circle"></i></a>

                                                    <?php
                                                }else{
                                                    echo "Yes";
                                                }
                                            }
                                        }else{
                                            ?>
                                                @if ($mytask->isverified==1)
                                            
                                                        {{ "Yes" }}
                                                @else
                                                        {{ "No" }}            
                                                        
                                                @endif
                                            <?php
                                        }

                                    ?>
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
            </div>
        </div><!--end of card-->
      </div>
    </div>
</div>
@endsection

