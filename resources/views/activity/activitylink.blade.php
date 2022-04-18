@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Add Activity',
    'activePage' => 'activitys',
    'activeNav' => '',
    'backgroundImage' => asset('now') . "/img/logo.png",
])

@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">

        <div class="card">
            <div class="card-header bg-info">
              <h5 class="title text-white"><i class="fa fa-fw fa-circle-check"></i>Activity Added</h5>
            </div>
            <div class="card-body">
                <em>Please Copy the link below and share it to your participant...</em>
                <div class="alert alert-success rounded-0">
                    <p id="attendancelink" style="color: white; font-weight: bolder;">{{ url('/') }}/guest/{{ $ativityid }}/{{ $realid }}</p>
                </div>
            </div>
            <div class="card-footer">
                <button onclick="copy('attendancelink')" id="cboard" class="btn btn-info rounded-0"><i class="fa fa-fw fa-clipboard"></i>Copy to Clipboard</button>
            </div>
        </div>
 
    </div>
</div>
@endsection
