@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Dashboard | ',
    'activePage' => 'dashboard',
    'backgroundImage' => asset('assets') . "/img/logo.png",
])
@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="bg-light p-2 rounded">
            <div class="row">
                <div class="col-md-6">
                    <h4>Hi {{ auth()->user()->name }}</h4>
                    <label class="badge badge-info h6">{{ date('Y-m-d H:i:s') }}</label><br>
                    @foreach ($user as $userdata)
                        Your logged in as <label class="badge badge-danger">{{ $userdata->title }}</label>
                    @endforeach
                </div>
                <div class="col-md-4">
                </div>
            </div>
               
            </div>
        </div>
    </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <h5 class="text-white fw-bolder"><i class="fa fa-fw fa-th-list"></i>Task(s)</h5>
                    </div>
                    <div class="card-body">
                        @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    @livewire('todos')
                        
                    </div>
                    <div class="card-footer">
                       
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <h5 class="text-white fw-bolder"><i class="fa fa-fw fa-th-list"></i>On Progress</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @forelse ($taskprogress as $itemprogress)

                                    <li class="list-group-item"><span class="badge badge-success"><i class="fa-solid fa-list-check"></i></span>{{ $itemprogress->taskDetail }}</li>

                            @empty
                                <div class="alert alert-info">
                                    No task added
                                </div>
                            @endforelse
                        </ul>
                    </div>
                    <div class="card-footer">
                        @if($taskprogress->total() > $taskprogress->perPage())
                            {{$taskprogress->links()}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
            <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <h5 class="text-white fw-bolder"><i class="fa fa-fw fa-th-list"></i>Completed</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @forelse ($taskdone as $itemdone)

                                    <li class="list-group-item"><span class="badge badge-success"><i class="fa fa-fw fa-check-circle"></i></span>{{ $itemdone->taskDetail }}</li>

                            @empty
                                <div class="alert alert-info">
                                    No task added
                                </div>
                            @endforelse
                        </ul>
                    </div>
                    <div class="card-footer">
                        @if($taskdone->total() > $taskdone->perPage())
                            {{$taskdone->links()}}
                        @endif
                    </div>
                </div>

        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <h5 class="text-white fw-bolder"><i class="fa fa-fw fa-folder"></i>Report(s)</h5>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('report') }}" class="badge badge-info text-uppercase"><i class="fa fa-fw fa-file"></i>Accomplishment Report</a>
                    </div>
                </div>
            </div>
        </div>
    <div>

    </div>
</div>

@endsection
