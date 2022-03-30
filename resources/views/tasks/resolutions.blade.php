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
                {{-- <a href="tasks.resolutions/{{ auth()->user()->id  }}" class="btn btn-success"><i class="fas fa-plus-circle"></i> New response </a> --}}
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
                <ul class="list-group">
                    @foreach($responses as $response)
                        <li class="list-group-item active">{{ $response->taskDetail }} | <label class="badge badge-warning text-white">{{ $response->resodate }}</label> </li>
                        <li class="list-group-item"><i class="fa fa-fw fa-angle-right"></i>Project: {{ $response->shortName }}</li>
                        <li class="list-group-item"><i class="fa fa-fw fa-angle-right"></i>Source: {{ $response->name }}</li>
                        <li class="list-group-item"><i class="fa fa-fw fa-angle-right"></i>Response: {{ $response->resolutionDetails }}</li>
                        @if ($response->taskResolved==0)
                            <li class="list-group-item">
                                <strong>Resolved?</strong>
                                <div class="row">
                                    <div class="col-md-1">
                                            <form class="form-inline" action="{{ route('resolved') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="verifiedBy" value="1">
                                                <input type="hidden" name="id" value="{{ $response->resoid }}">
                                                <button class="btn  btn-block btn-success" type="submit">YES</button>
                                            </form>
                                        </div>
                                        <div class="col-md-2">
                                            <form action="{{ route('resolved') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="verifiedBy" value="2">
                                                <input type="hidden" name="id" value="{{ $response->resoid }}">
                                                <button class="btn  btn-block btn-success" type="submit">Progress</button>
                                            </form>
                                        </div>
                                        <div class="col-md-1">
                                            <form action="{{ route('resolved') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="verifiedBy" value="0">
                                                <input type="hidden" name="id" value="{{ $response->resoid }}">
                                                <button class="btn btn-block btn-success" type="submit">NO</button>
                                            </form>
                                        </div>
                                </div>
                            </div>
                        </li>
                        @else
                            <li class="list-group-item active"><a href="{{ route('markasresolved', ['id' => $response->resoid]) }}" class="btn btn-xs btn-success"><i class="fa fa-fw fa-thumbs-up"></i>Yes</a></li>
                            
                        @endif    
                    @endforeach
                </ul>
                        
            </div>
        </div><!--end of card-->
      </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Submitted Screenshots || Photos</h5>
                </div>
                <div class="card-body">
                    @forelse ($evidence as $evi)
                      
                        <a href="{{asset('images')}}/{{$evi->path}}" target="_blank">
                            <img class="img-thumbnail" width="500" src="{{asset('images')}}/{{$evi->path}}" alt="{{ $evi->name }}">
                        </a>
                    @empty
                        <div class="alert alert-warning">
                            No images found...
                        </div>    
                    @endforelse
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

