@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Add Activity',
    'activePage' => 'activitys',
    'activeNav' => '',
    'backgroundImage' => asset('now') . "/img/logo.png",
])

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card text-center">
                <div class="card-header bg-info">
                    <h6 class="text-white">You are here because you've given a link for attendance</h6>
                </div>
                <div class="card-body">

                </div>
            <div class="card-footer">
            </div>
        </div>
    </div>
 
    </div>
</div>
@endsection
