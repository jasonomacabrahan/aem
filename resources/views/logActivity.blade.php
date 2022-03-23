@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Dashboard',
    'activePage' => 'dashboard',
    'backgroundImage' => asset('assets') . "/img/logo.png",
])
@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h5 class="text-white"><i class="fa fa-fw fa-th-list"></i>Activity Log</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table id="list" class="table table-bordered">
                                <thead>

                                    <tr>
                                        <th style="font-size: 9pt; font-weight: bolder;">No</th>
                                        <th style="font-size: 9pt; font-weight: bolder;">Subject</th>
                                        <th style="font-size: 9pt; font-weight: bolder;">URL</th>
                                        <th style="font-size: 9pt; font-weight: bolder;">Method</th>
                                        <th style="font-size: 9pt; font-weight: bolder;">Ip</th>
                                        <th style="font-size: 9pt; font-weight: bolder;" width="300px">User Agent</th>
                                        <th style="font-size: 9pt; font-weight: bolder;">Name</th>
                                        <th style="font-size: 9pt; font-weight: bolder;">Log Date</th>
                                        
                                    </tr>
                            </thead>
                                @if($logs->count())
                                    @foreach($logs as $key => $log)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $log->subject }}</td>
                                        <td class="text-success">{{ $log->url }}</td>
                                        <td><label class="label label-info">{{ $log->method }}</label></td>
                                        <td class="text-warning">{{ $log->ip }}</td>
                                        <td class="text-danger">{{ $log->agent }}</td>
                                        <td>{{ $log->name }}</td>
                                        <td>{{ $log->logdate }}</td>
                                        
                                    </tr>
                                    @endforeach
                                @endif
                            </table>
                        </div>
                        </div>
        
                    </div>
                </div>
            </div>
        
        
    </div>
</div>
@endsection