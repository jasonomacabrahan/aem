@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Add Response',
    'activePage' => 'respond',
    'activeNav' => '',
    'backgroundImage' => asset('now') . "/img/logo.png",
])

@section('content')

<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <h2><i class="fa fa-fw fa-th-list"></i>Assignment Resolutions</h2>
                  {{-- <a href="tasks.resolutions/{{ auth()->user()->id  }}" class="btn btn-success"><i class="fas fa-plus-circle"></i> New response </a> --}}
                </div>
              <div class="card-body">
                <div class="form-group">
                    @foreach ($responses as $det)
                        
                    @endforeach
                    <ul>
                      <li><strong>Task:</strong> {{ $det->taskDetail }}</li>
                      <li><strong>Date Created:</strong>  {{ $det->created_at }}</li>
                    </ul>
                </div>
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

                  @if ($message = Session::get('resolved'))
                        <script>
                            swal("Success","Successfully change your resolved status","success");
                        </script>
                  @endif
                  
                  @if ($message = Session::get('error'))
                  <script>
                      swal("Oops","Something is wrong I cant Identify","error");
                      </script>
                  @endif
                  
                      @foreach($responses as $response)@endforeach
                        @if ($response->taskBy==auth()->user()->id)
                                <?php
                                    if($isresolved==0){
                                        ?>
                                                <strong>Resolved?</strong>
                                                <div class="row">
                                                    <div class="col-md-2">
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
                                                                <button class="btn  btn-block btn-success" type="submit">Progress</button>
                                                            </form>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <form action="{{ route('resolved') }}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="verifiedBy" value="0">
                                                                <input type="hidden" name="id" value="{{ $assignmentid }}">
                                                                <button class="btn btn-block btn-success" type="submit" disabled>NO</button>
                                                            </form>
                                                        </div>
                                                </div>
                                        <?php
                                    }
                                    elseif($isresolved==2)
                                    {
                                        ?>
                                    
                                    <strong>Resolved?</strong>
                                    <div class="row">
                                        <div class="col-md-2">
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
                                                    <button class="btn  btn-block btn-success" type="submit" disabled>Progress</button>
                                                </form>
                                            </div>
                                            <div class="col-md-2">
                                                <form action="{{ route('resolved') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="verifiedBy" value="0">
                                                    <input type="hidden" name="id" value="{{ $assignmentid }}">
                                                    <button class="btn btn-block btn-success" type="submit">NO</button>
                                                </form>
                                            </div>
                                    </div>
                                        
                                    
                                        <?php
                                    }else{
                                        ?>
                                            <div class="alert alert-info opacity-0.5">
                                                You cannot respond to this task anymore...
                                            </div>
                                            <strong>Resolved?</strong>
                                        <div class="row">
                                            <div class="col-md-2">
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
                                                        <button class="btn  btn-block btn-success" type="submit">Progress</button>
                                                    </form>
                                                </div>
                                                <div class="col-md-2">
                                                    <form action="{{ route('resolved') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="verifiedBy" value="0">
                                                        <input type="hidden" name="id" value="{{ $assignmentid }}">
                                                        <button class="btn btn-block btn-success" type="submit">NO</button>
                                                    </form>
                                                </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                        @else
                            
                        @endif
                  
                        </div><!--end of card-->
    

                        <?php
                            if($isresolved==0){
                                ?>
                               <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            
                                            <form action="{{ route('savethreadrespond') }}" method="POST" enctype="multipart/form-data" id="upload-image" class="mt-1 py-3">
                                            @csrf
                                            <div class="form-group">
                                                <label for="resolutionDetails" class="text-dark fw-bolder"><strong>{{__("Response:")}}</strong></label><br>
                                                {{-- <input type="hidden" name="id" value="{{ $resoid }}"> --}}
                                                <input type="hidden" name="taskAssignmentID" value="{{ $assignmentid }}">
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
                                <?php
                            }
                            elseif($isresolved==2)
                            {
                                ?>
                               
                               <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            
                                            <form action="{{ route('savethreadrespond') }}" method="POST" enctype="multipart/form-data" id="upload-image" class="mt-1 py-3">
                                            @csrf
                                            <div class="form-group">
                                                <label for="resolutionDetails" class="text-dark fw-bolder"><strong>{{__("Response:")}}</strong></label><br>
                                                {{-- <input type="hidden" name="id" value="{{ $resoid }}"> --}}
                                                <input type="hidden" name="taskAssignmentID" value="{{ $assignmentid }}">
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
                                
                                <?php
                            }else{
                                ?>
                                  
                                <?php
                            }
                        ?>

<div class="row">
    <div class="col-md-12" >
          <div class="card">
            <div class="card-header bg-info">
              <h5 class="title text-white">{{__(" Task Response(s)")}}</h5>
            </div><!--end of header-->
            <div class="card-body">
                  @if ($message = Session::get('success'))
                  <script>
                      swal("Success","response Added","success");
                  </script>
                 @endif
                 @if ($message = Session::get('delete'))
                  <script>
                      swal("Success","Response deleted","success");
                  </script>
                 @endif
                 
                    <div class="col-md-12">
                        @foreach ($responses as $item)
                            @if ($item->userID==auth()->user()->id)
                            <div class="row">
                                <div class="col-md-9">

                                </div>
                                
                                <div class="col-md-9">
                                    <blockquote class="blockquote alert alert-info rounded-0">
                                        {{-- <a href="{{route('deletemymessage', ['id' => $item->resoid])}}" class="float-right"><i class="fa fa-fw fa-trash fa-xs"></i></a> --}}
                                        <p class="mb-0">{{ $item->resolutionDetails}}</p>
                                            
                                            @if (empty($item->path))
                                            
                                            @else
                                                
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
                                                
                                            @endif
                                        
                                        
                                        <footer class="blockquote-footer  text-white">{{ auth()->user()->name }} | <cite title="">{{ $item->resodate}}</cite></footer>
                                    </blockquote>
                                </div>
                            </div>
                            @else
                                <div class="row">
                                    <div class="col-md-9">
                                        <blockquote class="blockquote rounded-0">
                                            <p class="mb-0">{{ $item->resolutionDetails}}</p>
                                            @if (empty($item->path))
                                            
                                            @else
                                                
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
                                                
                                            @endif
                                            <footer class="blockquote-footer">
                                                @php
                                                    $data = App\Models\User::Select('name')->where('id',$item->userID)->get();
                                                @endphp
                                                @foreach($data as $element)
                                                    <span style="" class="badge badge-info"> {{ $element->name ?? '' }}</span>
                                                @endforeach

                                                | <cite title="">{{ $item->resodate}}</cite></footer>
                                        </blockquote>
                                    </div>
                                    <div class="col-md-9">

                                    </div>
                                </div>
                            @endif
                            
                        @endforeach
                    </div>

                
                        </div><!--end of card-->
                </div><!--end of card-->
            </div><!--end of col-md-12-->
        </div>
                
        
</div><!--end of content-->
@endsection
