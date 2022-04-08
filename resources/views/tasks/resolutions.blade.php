@extends('layouts.app', [
    'namePage' => 'RESOLUTIONS LIST',
    'class' => 'sidebar-mini',
    'activePage' => 'Resolutions',

])

@section('content')
  <div class="panel-header panel-header-sm">

  </div>
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                <h2><i class="fa fa-fw fa-th-list"></i>Assignment Resolutions</h2>
                <a href="{{ route('tasks.index')  }}" class="btn btn-info rounded-0"><i class="fas fa-arrow-left"></i> Go back to Task Assignments </a>
              </div>
            <div class="card-body">
                <style>
                    table,th,td,tr,thead{
                        font-size: 10pt;!important;
                    }
                </style>
                 @if ($message = Session::get('success'))
                <script>
                     swal("Success","response Addedd","success");
                </script>
                @endif
                
                @if ($message = Session::get('error'))
                <script>
                    swal("Oops","Something is wrong I cant Identify","error");
                    </script>
                @endif
                    <div class="card shadow rounded-0">
                        <div class="card-header">

                        </div>
                        <div class="card-body">
                            <ul>
                                <li><strong>Task Details</strong>
                                    <ul>
                                        <li>{{ $assignmentdetails }}</li>
                                    </ul>
                                </li>
                                <li><strong>Date Created</strong>
                                    <ul>
                                        <li>{{ $assignmentdatecreated }}</li>
                                    </ul>
                                </li>
                                <li><strong>Resolved?</strong>
                                    <ul>
                                        <li>
                                            @if ($taskresolved==1)
                                                Yes
                                            @endif
                                            @if ($taskresolved==2)
                                                Progress
                                            @endif
                                            @if ($taskresolved==0)
                                                No
                                            @endif
                                            
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            @foreach($responses as $response)@endforeach
                            <?php
                                if($taskresolved==0){
                                    ?>
                                            <strong>Resolved?</strong>
                                            <div class="row">
                                                <div class="col-md-1">
                                                        <form class="form-inline" action="{{ route('resolved') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="verifiedBy" value="1">
                                                            <input type="hidden" name="id" value="{{ $assignmentid }}">
                                                            <button class="btn  btn-block btn-success" type="submit">YES</button>
                                                        </form>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <form action="{{ route('resolved') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="verifiedBy" value="2">
                                                            <input type="hidden" name="id" value="{{ $assignmentid }}">
                                                            <button class="btn  btn-block btn-warning" type="submit">In Progress</button>
                                                        </form>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <form action="{{ route('resolved') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="verifiedBy" value="0">
                                                            <input type="hidden" name="id" value="{{ $assignmentid }}">
                                                            <button class="btn btn-block btn-danger" type="submit" disabled>NO</button>
                                                        </form>
                                                    </div>
                                            </div>
                                        
                                    <?php
                                }
                                elseif($taskresolved==2)
                                {
                                    ?>
                                   
                                    
                                        <strong>Resolved?</strong>
                                        <div class="row">
                                            <div class="col-md-1">
                                                    <form class="form-inline" action="{{ route('resolved') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="verifiedBy" value="1">
                                                        <input type="hidden" name="id" value="{{ $assignmentid }}">
                                                        <button class="btn  btn-block btn-success" type="submit">YES</button>
                                                    </form>
                                                </div>
                                                <div class="col-md-2">
                                                    <form action="{{ route('resolved') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="verifiedBy" value="2">
                                                        <input type="hidden" name="id" value="{{ $assignmentid }}">
                                                        <button class="btn  btn-block btn-warning" type="submit" disabled>In Progress</button>
                                                    </form>
                                                </div>
                                                <div class="col-md-1">
                                                    <form action="{{ route('resolved') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="verifiedBy" value="0">
                                                        <input type="hidden" name="id" value="{{ $assignmentid }}">
                                                        <button class="btn btn-block btn-danger" type="submit">NO</button>
                                                    </form>
                                                </div>
                                        </div>
                                    </div>
                                
                                    <?php
                                }else{
                                    ?>
                                        <strong>Resolved?</strong>
                                        <div class="row">
                                            <div class="col-md-1">
                                                    <form class="form-inline" action="{{ route('resolved') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="verifiedBy" value="1">
                                                        <input type="hidden" name="id" value="{{ $assignmentid }}">
                                                        <button class="btn  btn-block btn-success" type="submit" disabled>YES</button>
                                                    </form>
                                                </div>
                                                <div class="col-md-2">
                                                    <form action="{{ route('resolved') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="verifiedBy" value="2">
                                                        <input type="hidden" name="id" value="{{ $assignmentid }}">
                                                        <button class="btn  btn-block btn-warning" type="submit">In Progress</button>
                                                    </form>
                                                </div>
                                                <div class="col-md-1">
                                                    <form action="{{ route('resolved') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="verifiedBy" value="0">
                                                        <input type="hidden" name="id" value="{{ $assignmentid }}">
                                                        <button class="btn btn-block btn-danger" type="submit">NO</button>
                                                    </form>
                                                </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            ?>
                        

                        </div>
                    </div>
                    
                
            </div><!--end of card-->
    

        @if ($taskresolved==0 OR $taskresolved==2)
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                
                                <form action="{{ route('savethreadrespond') }}" method="POST" enctype="multipart/form-data" id="upload-image" class="mt-1 py-3">
                                @csrf
                                <div class="form-group">
                                    <label for="resolutionDetails" class="text-dark fw-bolder"><strong>{{__("Response:")}}</strong></label><br>
                                    {{-- <input type="hidden" name="id" value="{{ $resoid }}"> --}}
                                    <input type="hidden" name="taskAssignmentID" value="{{ $response->taskID }}">
                                    <textarea class="form-control border border-info form-bordered" name="resolutionDetails" id="resolutionDetails" rows="20"></textarea>
                                    @include('alerts.feedback', ['field' => 'resolutionDetails'])
                                </div>
                                <div class="btn-file input-group hdtuto control-group lst increment rounded-0" >
                                    <input type="file" name="name[]" class="myfrm form-control">
                                    <div class="input-group-btn  rounded-0"> 
                                        {{-- <button class="btn btn-success" type="button"><i class="fldemo fa fa-fw fa-plus"></i></button> --}}
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-info"><i class="fa fa-fw fa-paper-plane"></i> Respond  </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @else
        @endif
    
      <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @foreach ($responses as $item)
                            @if ($item->userID==auth()->user()->id)
                            <div class="row">
                                <div class="col-md-9">

                                </div>
                                <div class="col-md-9">
                                    <blockquote class="blockquote alert alert-info rounded-0">
                                        <p class="mb-0">{{ $item->resolutionDetails}}</p>
                                        @foreach ($evidence as $itemeid)
                                                        @foreach ($itemeid as $items)
                                                           @if ($item->task_id==$items->task_id)
                                                            
                                                            <a href="{{asset('images')}}/{{ $items->path}}" target="_blank">
                                                                <img src="{{asset('images')}}/{{ $items->path}}" alt="" class="img-thumbnail" width="200px">
                                                            </a>
                                                                
                                                                
                                                           @else
                                                               
                                                           @endif 
                                                            
                                                        @endforeach    
                                        @endforeach  
                                        
                                        <footer class="blockquote-footer  text-white">{{ auth()->user()->name }} | <cite title="">{{ $item->created_at}}</cite></footer>
                                    </blockquote>
                                </div>
                            </div>
                            @else
                                <div class="row">
                                    <div class="col-md-9">
                                        <blockquote class="blockquote rounded-0">
                                            <p class="mb-0">{{ $item->resolutionDetails}}</p>
                                                @foreach ($evidence as $itemeid)
                                                        @foreach ($itemeid as $items)
                                                           @if ($item->task_id==$items->task_id)
                                                                
                                                            <a href="{{asset('images')}}/{{ $items->path}}" target="_blank">
                                                                <img src="{{asset('images')}}/{{ $items->path}}" alt="" class="img-thumbnail" width="200px">
                                                            </a>
                                                           @else
                                                               
                                                           @endif 
                                                            
                                                        @endforeach    
                                                @endforeach  
                                            <footer class="blockquote-footer">{{ $item->userID }} | <cite title="">{{ $item->created_at}}</cite></footer>
                                        </blockquote>
                                    </div>
                                    <div class="col-md-9">

                                    </div>
                                </div>
                            @endif                            
                        @endforeach
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection

