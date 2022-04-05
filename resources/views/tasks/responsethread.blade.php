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
    @if ($isresolved == 0)
        <div class="row">
            <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                        <form action="{{ route('savethreadrespond') }}" method="POST" enctype="multipart/form-data" id="upload-image" class="mt-1 py-3">
                            @csrf
                            <div class="form-group">
                                <label for="resolutionDetails" class="text-dark fw-bolder"><strong>{{__("Response:")}}</strong></label><br>
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
    @else
        
    @endif
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
                    <div class="col-md-12">
                        <div class="form-group">
                            {{-- <ul>
                              <li><strong>Task:</strong> {{ $responses->taskDetail }}</li>
                              <li><strong>Project</strong> {{ $responses->shortName }}</li>
                              <li><strong>Date Created:</strong>  {{ $responses->created_at }}</li>
                            </ul> --}}
                        </div>
                        @foreach ($responses as $item)
                            @if ($item->userID==auth()->user()->id)
                            <div class="row">
                                <div class="col-md-9">

                                </div>
                                <div class="col-md-9">
                                    <blockquote class="blockquote alert alert-info rounded-0">
                                        <p class="mb-0">{{ $item->resolutionDetails}}</p>
                                        @if ($item->path==null)
                                            
                                        @else
                                        <span style="font-size: 8pt;">Attachment Available:</span> 
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Attachment</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="{{asset('images')}}/{{ $item->path}}">
                                                    <a href="{{asset('images')}}/{{ $item->path}}" target="_blank"><i class="fa fa-fw fa-download"></i>Download</a>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                            </div>
                                        </div>

                                            <a href="javacript:void(0)"data-toggle="modal" data-target="#exampleModal">
                                                <i class="fas fa-image"></i>
                                            </a>
                                            
                                            
                                        @endif
                                        
                                        <footer class="blockquote-footer  text-white">{{ auth()->user()->name }} | <cite title="">{{ $item->created_at}}</cite></footer>
                                    </blockquote>
                                </div>
                            </div>
                            @else
                                <div class="row">
                                    <div class="col-md-9">
                                        <blockquote class="blockquote rounded-0">
                                            <p class="mb-0">{{ $item->resolutionDetails}}</p>
                                            @if ($item->path==null)
                                            
                                            @else
                                                <span>Attachment Available:</span>
                                               
                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Attachment</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img src="{{asset('images')}}/{{ $item->path}}">
                                                            <a href="{{asset('images')}}/{{ $item->path}}" target="_blank"><i class="fa fa-fw fa-download"></i>Download</a>
                                                        </div>
                                                        <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
        
                                                    <a href="javacript:void(0)"data-toggle="modal" data-target="#exampleModal">
                                                        <i class="fas fa-image"></i>
                                                    </a>
                                                
                                                
                                            @endif
                                            <footer class="blockquote-footer">{{ $item->userID }} | <cite title="">{{ $item->created_at}}</cite></footer>
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