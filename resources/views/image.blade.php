@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Image Upload ',
    'activePage' => '',
    'backgroundImage' => asset('assets') . "/img/logo.png",
])
@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h5 class="text-white"><i class="fa fa-fw fa-th-list"></i>Image Upload</h5>
                        </div>

                        <div class="card-body">
                            
                            
                            <img src="{{ url('storage/images/5bICnj2G5NMXsAenf9uBwOhbsvsfiEQqjvZlcXLD.jpg') }}" alt="" title="" />

                            @if(session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            @error('image')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                            <form method="POST" enctype="multipart/form-data" id="upload-image" action="{{ route('save') }}" >
                                @csrf

                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail img-raised">
                                        <img src="https://epicattorneymarketing.com/wp-content/uploads/2016/07/Headshot-Placeholder-1.png" alt="...">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
                                    <div>
                                        <span class="btn btn-raised btn-round btn-default btn-file">
                                            <input type="file" name="image" id="image">
                                        </span>
                                        <button type="submit" data-dismiss="fileinput" class="btn btn-danger btn-round fileinput-exists" id="submit">Submit</button>
                                    </div>
                                </div>

                                
                                
                            </form>
                        </div>
        
                    </div>
                </div>
            </div>
        
        
    </div>
</div>
@endsection