@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Activity Attendace | ',
    'activePage' => 'activitys',
    'activeNav' => '',
    'backgroundImage' => asset('now') . "/img/logo.png",
])

@section('content')
<div class="panel-header panel-header-sm">

</div>
<div class="container-fluid">
    <div class="row">
        @if ($message = Session::get('attendanceok'))
            <script>
                swal("Success","You are now registered to this activity","success");
            </script>
        @endif
        @if ($message = Session::get('attendancenotok'))
        <script>
            swal("Sorry","You are already registered to this activity","error");
        </script>
    @endif
        <div class="col-md-12">
            <div class="card text-center">
                <div class="card-header bg-info">
                    <h6 class="text-white">You are here because you've given a link for attendance</h6>
                </div>
                <div class="card-body">
                    <div class="alert alert-success">
                        You are now registered to this activity. We valued your time. Thank you. 
                    </div>
                </div>
            <div class="card-footer">
            </div>
        </div>
    </div>
 
    </div>
</div>
@endsection


