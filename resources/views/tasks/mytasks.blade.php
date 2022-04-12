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
                @can('createmytask')
                    <a href="{{ route('addmytask') }}" class="btn btn-info"><i class="fa fa-fw fa-plus"></i>Create My Task</a>
                @endcan

                {{-- @can('assign_task')
                    <a href="{{ route('taskform') }}" class="btn btn-info"><i class="fa fa-fw fa-plus"></i>New Task</a>
                @endcan --}}
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

                @if ($message = Session::get('successtask'))
                 <script>
                     swal("Success","Task Added","success");
                 </script>
                @endif

                 @if ($message = Session::get('createsuccess'))
                 <script>
                     swal("Success","Task Added","success");
                 </script>
                @endif

                @if ($message = Session::get('ok'))
                 <script>
                     swal("Success","Changes Saved...","success");
                 </script>
                @endif

                @if(Session::has('status-success'))
                    <div class="alert alert-success">
                        {{Session::get('status-success')}}
                    </div>
                @endif


                @if ($message = Session::get('error'))
                 <script>
                     swal("Oops","Something is wrong I cant Identify","error");
                 </script>
                @endif
                 <div class="table table-responsive">
                     <table id="list" class="table table-striped table-hover table-bordered" style="width:100%">
                        <thead >
                        <tr>
                            <th style='font-size: 9pt; font-weight: bold;'>Task Detail</th>
                            <th style='font-size: 9pt; font-weight: bold;'>Program</th>
                            <th style='font-size: 9pt; font-weight: bold;'>Source</th>
                            <th style='font-size: 9pt; font-weight: bold;'>Resolved</th>
                            <th style='font-size: 9pt; font-weight: bold;'>Created@</th>
                            <th style='font-size: 9pt; font-weight: bold;'><i class="fa fa-fw fa-cog"></i></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mytasks as $mytask)
                            <tr>
                                <td>
                                    <?php
                                        $source = $mytask->thesource; 
                                        $user = auth()->user()->name;
                                        $datewithtime = $mytask->datecreated;
                                        $datewotime = date("Y-m-d",strtotime($datewithtime));
                                        if($user==$source AND $mytask->isresolved==0)
                                        {
                                            ?>
                                                <a href="{{ route('editmytask', ['id' => $mytask->taskid])  }}"><i class="fa fa-fw fa-edit"></i><?php echo $mytask->taskDetail ?></a>
                                            <?php
                                        }else{
                                                echo $mytask->taskDetail; 
                                           
                                        }
                                        ?>
                                        @if($datewotime == date('Y-m-d'))
                                            <sup><label class="badge badge-success text-white">new</label></sup>
                                        @else
                                            
                                        @endif
                                        
                                </td>
                                <td>{{ $mytask->shortName }}</td>
                                <td>

                                    <?php 
                                        $source = $mytask->thesource; 
                                        $user = auth()->user()->name;
                                        if ($user==$source) {
                                            echo $source.''.'<strong>(me)</strong>';
                                        }else{
                                            echo $source;
                                        }
                                    ?>
                                             
                                        
                                </td>
                                <td>
                                    <?php 
                                        $source = $mytask->thesource; 
                                        $user = auth()->user()->name;
                                        if ($user==$source) {
                                            if($mytask->isresolved==1){
                                                ?>
                                                <label class="badge badge-success text-white">Yes</label>
                                                <?php
                                            }
                                            else if($mytask->isresolved==2)
                                            {
                                                ?>
                                                <label class="badge badge-warning text-white">In Progress</label>
                                                <?php

                                            }
                                            else if($mytask->isresolved==0)
                                            {
                                                ?>
                                                <label class="badge badge-danger text-white"><i class="fas fa-exclamation-circle"></i>No</label>    
                                                <?php

                                            }else{
                                                ?>
                                                <div class="row">
                                                        <div class="col-md-1">
                                                            <form class="form-inline" action="{{ route('resolved') }}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="verifiedBy" value="1">
                                                                <input type="hidden" name="id" value="{{ $mytask->taskid }}">
                                                                <button type="submit"><i class="fa fa-fw fa-thumbs-up"></i></button>
                                                            </form>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <form action="{{ route('resolved') }}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="verifiedBy" value="2">
                                                                <input type="hidden" name="id" value="{{ $mytask->taskid }}">
                                                                <button type="submit"><i class="fa fa-fw fa-person-running"></i></button>
                                                            </form>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <form action="{{ route('resolved') }}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="verifiedBy" value="0">
                                                                <input type="hidden" name="id" value="{{ $mytask->taskid }}">
                                                                <button type="submit"><i class="fa fa-fw fa-thumbs-down"></i></button>
                                                            </form>
                                                        </div>
                                                </div>
                                                <?php
                                            }
                                        }else{
                                            ?>
                                                @if ($mytask->isresolved==1)
                                            
                                                        {{ "Yes" }}
                                                @else
                                                        {{ "No" }}            
                                                        
                                                @endif
                                            <?php
                                        }

                                    ?>
                                </td>
                                <td>{{ $mytask->datecreated }}</td>
                                <td>
                                     @if ($mytask->resolutionDetails==null)
                                            <a href="{{ route('respond', ['id' => $mytask->taskid])  }}" class="btn btn-info btn-xs"><i class="fa-solid fa-reply"></i></a>
                                     @else
                                            <a href="{{route('responsethread', ['id' => $mytask->taskid,'taskby'=>$mytask->taskBy])}}" class="btn btn-xs btn-success" title="thread response"><i class="fa fa-fw fa-comment"></i><i class="fa fa-fw fa-users"></i></a>
                                     @endif
                                     
                                    @can('deletetask')
                                        <a href="{{ route('destroy', $mytask->taskid) }}" class="btn btn-danger"><i class="fa fa-fw fa-trash"></i></a>
                                    @endcan
                                    
                                </td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot style='font-size: 8pt;'>
                        <tr style='font-size: 8pt;'>
                            <th>Task Detail</th>
                            <th>Program</th>
                            <th>Source</th>
                            <th>Resolved</th>
                            <th>Created@</th>
                            <th><i class="fa fa-fw fa-cog"></i></th>
                            
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

